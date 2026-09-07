<?php

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('gosor hr landing page loads successfully in english', function () {
    $response = $this->get('/gosor-hr?lang=en');

    $response->assertStatus(200);
    $response->assertSee('Gosor HR');
    $response->assertSee('Smart Attendance');
});

test('gosor hr landing page loads successfully in arabic with rtl', function () {
    $response = $this->get('/gosor-hr?lang=ar');

    $response->assertStatus(200);
    $response->assertSee('dir="rtl"', false);
    $response->assertSee('Gosor HR');
    $response->assertSee('الحضور والانصراف');
});

test('gosor calendar route redirects to gosor hr', function () {
    $response = $this->get('/gosor-calendar');

    $response->assertRedirect('/gosor-hr');
});

test('can submit a demo request for gosor hr', function () {
    $payload = [
        'name' => 'John Doe',
        'email' => 'john@acme.com',
        'phone' => '+201000000000',
        'company' => 'Acme Corp',
        'employees_count' => 'professional',
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
});

test('demo request requires mandatory fields', function () {
    $response = $this->postJson(route('gosor-hr.demo'), []);

    $response->assertUnprocessable()
        ->assertJsonValidationErrors(['name', 'email', 'phone', 'company']);
});
