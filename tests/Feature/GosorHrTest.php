<?php

use App\Mail\NewContactRequestMail;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(LazilyRefreshDatabase::class);

test('gosor hr landing page loads successfully in english', function () {
    $response = $this->get('/g-hr?lang=en');

    $response->assertStatus(200);
    $response->assertSee('Gosor HR');
    $response->assertSee('Smart Attendance');
    $response->assertSee('150');
    $response->assertSee('Save up to 25%');
});

test('gosor hr landing page loads successfully in arabic with rtl', function () {
    $response = $this->get('/g-hr?lang=ar');

    $response->assertStatus(200);
    $response->assertSee('dir="rtl"', false);
    $response->assertSee('Gosor HR');
    $response->assertSee('الحضور والانصراف');
    $response->assertSee('150');
    $response->assertSee('وفّر حتى 25%');
});

test('gosor calendar route redirects to gosor hr', function () {
    $response = $this->get('/g-hr-calendar');

    $response->assertRedirect('/g-hr');
});

test('can submit a demo request for gosor hr and send notification email', function () {
    Mail::fake();

    $payload = [
        'name' => 'John Doe',
        'email' => 'john@acme.com',
        'phone' => '+201000000000',
        'company' => 'Acme Corp',
        'employees_count' => '35',
        'billing_cycle' => 'yearly',
        'estimated_price' => '5,250 EGP / month',
        'message' => 'Interested in replacing 4 fingerprint devices across 2 branches.',
    ];

    $response = $this->postJson(route('gosor-hr.demo'), $payload);

    $response->assertOk()
        ->assertJson([
            'success' => true,
        ]);

    $this->assertDatabaseHas(ContactMessage::class, [
        'name' => 'John Doe',
        'email' => 'john@acme.com',
        'company' => 'Acme Corp',
        'project_type' => 'Gosor HR - Smart Attendance & AI System',
    ]);

    $contact = ContactMessage::where('email', 'john@acme.com')->first();
    expect($contact->message)->toContain('35')
        ->toContain('اشتراك سنوي')
        ->toContain('5,250 EGP / month');

    Mail::assertSent(NewContactRequestMail::class, function ($mail) {
        return $mail->hasTo('mahfouzm25@gmail.com') &&
               $mail->contactMessage->email === 'john@acme.com' &&
               str_contains($mail->contactMessage->project_type, 'Gosor HR');
    });
});

test('demo request requires mandatory fields', function () {
    $response = $this->postJson(route('gosor-hr.demo'), []);

    $response->assertUnprocessable()
        ->assertJsonValidationErrors(['name', 'email', 'phone', 'company']);
});
