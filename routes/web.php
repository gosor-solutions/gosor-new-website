<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/contact', [LandingController::class, 'storeContact'])->name('contact.store');
Route::view('/success', 'web.success')->name('success');

Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }

    return back();
})->name('set-locale');
