<?php

use App\Http\Controllers\GosorHrController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/contact', [LandingController::class, 'storeContact'])->name('contact.store');
Route::view('/success', 'web.success')->name('success');

Route::get('/privacy-policy', [LandingController::class, 'privacyPolicy'])->name('privacy-policy');
Route::redirect('/policy', '/privacy-policy');

Route::get('/gosor-hr', [GosorHrController::class, 'index'])->name('gosor-hr');
Route::post('/gosor-hr/demo-request', [GosorHrController::class, 'requestDemo'])->name('gosor-hr.demo');
Route::redirect('/gosor-calendar', '/gosor-hr');

Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }

    return back();
})->name('set-locale');
