<?php

use App\Mail\NewContactRequestMail;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(LazilyRefreshDatabase::class);

test('landing contact form sends email to mahfouzm25@gmail.com with project type and details', function () {
    Mail::fake();

    $payload = [
        'name' => 'Ahmed Mohamed',
        'email' => 'ahmed@example.com',
        'phone' => '+201234567890',
        'company' => 'Gosor Partner Co.',
        'project_type' => 'Web & Mobile App Development',
        'message' => 'We need a custom e-commerce and logistics solution.',
    ];

    $response = $this->postJson(route('contact.store'), $payload);

    $response->assertOk()
        ->assertJson([
            'success' => true,
        ]);

    $this->assertDatabaseHas(ContactMessage::class, [
        'name' => 'Ahmed Mohamed',
        'email' => 'ahmed@example.com',
        'project_type' => 'Web & Mobile App Development',
    ]);

    Mail::assertSent(NewContactRequestMail::class, function (NewContactRequestMail $mail) {
        return $mail->hasTo('mahfouzm25@gmail.com') &&
               $mail->contactMessage->name === 'Ahmed Mohamed' &&
               $mail->contactMessage->project_type === 'Web & Mobile App Development' &&
               $mail->contactMessage->company === 'Gosor Partner Co.';
    });
});

test('contact request mailable renders expected html content', function () {
    $contact = new ContactMessage([
        'name' => 'Sara Ali',
        'email' => 'sara@example.com',
        'phone' => '+966501234567',
        'company' => 'Innovation Tech',
        'project_type' => 'Custom AI & ERP Integration',
        'message' => 'Looking for smart HR and ERP integration for 100+ employees.',
    ]);

    $mailable = new NewContactRequestMail($contact, 'Landing Page Form');

    $html = $mailable->render();

    expect($html)
        ->toContain('Custom AI &amp; ERP Integration')
        ->toContain('Sara Ali')
        ->toContain('sara@example.com')
        ->toContain('+966501234567')
        ->toContain('Innovation Tech')
        ->toContain('mahfouzm25@gmail.com');
});
