<?php

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('privacy policy page loads successfully in arabic', function () {
    $response = $this->get('/privacy-policy?lang=ar');

    $response->assertStatus(200);
    $response->assertSee('سياسة الخصوصية');
    $response->assertSee('Gosor Solutions');
});

test('privacy policy page loads successfully in english', function () {
    $response = $this->get('/privacy-policy?lang=en');

    $response->assertStatus(200);
    $response->assertSee('Privacy Policy & Terms of Service');
    $response->assertSee('Gosor Solutions');
});

test('policy route redirects to privacy policy', function () {
    $response = $this->get('/policy');

    $response->assertRedirect('/privacy-policy');
});
