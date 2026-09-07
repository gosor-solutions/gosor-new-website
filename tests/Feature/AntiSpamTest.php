<?php

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(LazilyRefreshDatabase::class);

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
