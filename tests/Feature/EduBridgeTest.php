<?php

use App\Mail\NewContactRequestMail;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(LazilyRefreshDatabase::class);

test('edu bridge landing page loads successfully in english', function () {
    $response = $this->get('/edu-bridge?lang=en');

    $response->assertStatus(200);
    $response->assertSee('Edu Bridge');
    $response->assertSee('Student Mobile App');
    $response->assertSee('Zoom');
});

test('edu bridge landing page loads successfully in arabic with rtl', function () {
    $response = $this->get('/edu-bridge?lang=ar');

    $response->assertStatus(200);
    $response->assertSee('dir="rtl"', false);
    $response->assertSee('Edu Bridge');
    $response->assertSee('تطبيق الطلاب');
    $response->assertSee('لوحات التحكم');
});

test('e-bridge route redirects to edu bridge', function () {
    $response = $this->get('/e-bridge');

    $response->assertRedirect('/edu-bridge');
});

test('can submit a demo request for edu bridge and send notification email', function () {
    Mail::fake();

    $payload = [
        'name' => 'Dr. Khaled Mahmoud',
        'email' => 'khaled@future-academy.edu',
        'phone' => '+201098765432',
        'institution_type' => 'academy',
        'students_count' => 'professional',
        'message' => 'Interested in setting up 3 branches with mobile app for 500 students.',
        '_form_time' => encrypt(time() - 10),
    ];

    $response = $this->postJson(route('edu-bridge.demo'), $payload);

    $response->assertOk()
        ->assertJson([
            'success' => true,
        ]);

    $this->assertDatabaseHas(ContactMessage::class, [
        'name' => 'Dr. Khaled Mahmoud',
        'email' => 'khaled@future-academy.edu',
        'project_type' => 'Edu Bridge - Academic & LMS Platform',
    ]);

    Mail::assertSent(NewContactRequestMail::class, function ($mail) {
        return $mail->hasTo('mahfouzm25@gmail.com') &&
               $mail->contactMessage->email === 'khaled@future-academy.edu' &&
               str_contains($mail->contactMessage->project_type, 'Edu Bridge');
    });
});

test('edu bridge demo request requires mandatory fields', function () {
    $response = $this->postJson(route('edu-bridge.demo'), []);

    $response->assertUnprocessable()
        ->assertJsonValidationErrors(['name', 'email', 'phone']);
});

test('edu bridge demo request traps spam bots filling honeypot', function () {
    Mail::fake();

    $payload = [
        'name' => 'Spam Bot',
        'email' => 'bot@spammer.com',
        'phone' => '+1234567890',
        'institution_type' => 'academy',
        'students_count' => 'starter',
        'message' => 'Spam message',
        '_hp_company_website' => 'http://spam.com',
        '_form_time' => encrypt(time() - 10),
    ];

    $response = $this->postJson(route('edu-bridge.demo'), $payload);

    $response->assertOk()
        ->assertJson([
            'success' => true,
        ]);

    $this->assertDatabaseMissing(ContactMessage::class, [
        'email' => 'bot@spammer.com',
    ]);

    Mail::assertNothingSent();
});
