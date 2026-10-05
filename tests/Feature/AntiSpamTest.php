<?php

use App\Mail\NewContactRequestMail;
use App\Models\ContactMessage;
use App\Services\AntiSpamService;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

uses(LazilyRefreshDatabase::class);

beforeEach(function () {
    Cache::flush();
});

test('bot filling honeypot is silently trapped without database write or email', function () {
    Mail::fake();

    $payload = [
        'name' => 'Spam Bot',
        'email' => 'spambot@example.com',
        'phone' => '+1234567890',
        'company' => 'Spamming LLC',
        'project_type' => 'SEO Spam',
        'message' => 'Buy cheap links now!',
        '_hp_company_website' => 'http://spamsite.com',
        '_form_time' => encrypt(time() - 10),
    ];

    $response = $this->postJson(route('contact.store'), $payload);

    $response->assertOk()
        ->assertJson([
            'success' => true,
        ]);

    $this->assertDatabaseMissing(ContactMessage::class, [
        'email' => 'spambot@example.com',
    ]);

    Mail::assertNothingSent();
});

test('fast automated submission under 2 seconds is ignored', function () {
    Mail::fake();

    $payload = [
        'name' => 'Fast Script',
        'email' => 'fast@example.com',
        'phone' => '+1234567890',
        'message' => 'Instant submission script',
        '_form_time' => encrypt(time()), // 0 seconds elapsed
    ];

    $response = $this->postJson(route('contact.store'), $payload);

    $response->assertOk()
        ->assertJson([
            'success' => true,
        ]);

    $this->assertDatabaseMissing(ContactMessage::class, [
        'email' => 'fast@example.com',
    ]);

    Mail::assertNothingSent();
});

test('rate limiter blocks request flooding after limit is reached', function () {
    Mail::fake();

    $validPayload = function ($i) {
        return [
            'name' => 'Real User '.$i,
            'email' => "user{$i}@example.com",
            'phone' => '+20100000000'.$i,
            'company' => 'Test Co',
            'message' => 'Hello Gosor '.$i,
            '_form_time' => encrypt(time() - 10),
        ];
    };

    // 3 allowed requests per minute
    $this->postJson(route('contact.store'), $validPayload(1))->assertOk();
    $this->postJson(route('contact.store'), $validPayload(2))->assertOk();
    $this->postJson(route('contact.store'), $validPayload(3))->assertOk();

    // 4th request should be throttled (HTTP 429)
    $response = $this->postJson(route('contact.store'), $validPayload(4));
    $response->assertStatus(429);
});

test('middleware blocks client IP when sending fake data more than 3 times in a minute', function () {
    Mail::fake();

    $fakePayload = function ($i) {
        return [
            'name' => 'Spammer '.$i,
            'email' => "temp_bot_{$i}@mailinator.com", // disposable fake domain
            'phone' => '0000000000', // fake phone
            'message' => 'Spam message '.$i,
            '_form_time' => encrypt(time() - 10),
        ];
    };

    // Strikes 1, 2, 3: trapped silently with success response (without saving to DB)
    $this->postJson(route('contact.store'), $fakePayload(1))->assertOk();
    $this->postJson(route('contact.store'), $fakePayload(2))->assertOk();
    $this->postJson(route('contact.store'), $fakePayload(3))->assertOk();

    // Strike 4 (> 3 in a minute): Blocked with HTTP 403 Forbidden!
    $strike4 = $this->postJson(route('contact.store'), $fakePayload(4));
    $strike4->assertStatus(403)
        ->assertJson([
            'success' => false,
            'blocked' => true,
        ]);

    // Subsequent requests from the same blocked IP are immediately rejected
    $blockedAttempt = $this->postJson(route('contact.store'), [
        'name' => 'Valid User',
        'email' => 'valid@gosor.net',
        'phone' => '+201012345678',
        'message' => 'Legitimate attempt after being blocked',
        '_form_time' => encrypt(time() - 10),
    ]);

    $blockedAttempt->assertStatus(403)
        ->assertJson([
            'blocked' => true,
        ]);
});

test('isRealEmail service correctly identifies real vs fake or disposable email addresses', function () {
    $service = app(AntiSpamService::class);

    // Real emails
    expect($service->isRealEmail('info@gosor.net'))->toBeTrue();
    expect($service->isRealEmail('client@gmail.com'))->toBeTrue();
    expect($service->isRealEmail('contact@yahoo.com'))->toBeTrue();

    // Fake / Disposable / Invalid emails
    expect($service->isRealEmail('spammer@mailinator.com'))->toBeFalse();
    expect($service->isRealEmail('bot@tempmail.com'))->toBeFalse();
    expect($service->isRealEmail('user@10minutemail.com'))->toBeFalse();
    expect($service->isRealEmail('fake@test.com'))->toBeFalse();
    expect($service->isRealEmail('asdasd@example.com'))->toBeFalse();
    expect($service->isRealEmail('aaaaaa@example.com'))->toBeFalse();
    expect($service->isRealEmail(''))->toBeFalse();
    expect($service->isRealEmail('invalid-email-string'))->toBeFalse();
});

test('submitting legitimate contact with verified email sends notification mail', function () {
    Mail::fake();

    $payload = [
        'name' => 'Dr. Karim Mostafa',
        'email' => 'karim@gmail.com',
        'phone' => '+201098765432',
        'company' => 'Modern Academy',
        'project_type' => 'Custom Software',
        'message' => 'Inquiring about web application development.',
        '_form_time' => encrypt(time() - 10),
    ];

    $response = $this->postJson(route('contact.store'), $payload);
    $response->assertOk();

    $this->assertDatabaseHas(ContactMessage::class, [
        'email' => 'karim@gmail.com',
    ]);

    Mail::assertSent(NewContactRequestMail::class);
});
