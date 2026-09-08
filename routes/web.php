<?php

use App\Http\Controllers\EduBridgeController;
use App\Http\Controllers\GosorHrController;
use App\Http\Controllers\LandingController;
use App\Mail\NewContactRequestMail;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/contact', [LandingController::class, 'storeContact'])
    ->middleware('throttle:contact-form')
    ->name('contact.store');
Route::view('/success', 'web.success')->name('success');

Route::get('/privacy-policy', [LandingController::class, 'privacyPolicy'])->name('privacy-policy');
Route::redirect('/policy', '/privacy-policy');

Route::get('/g-hr', [GosorHrController::class, 'index'])->name('gosor-hr');
Route::post('/g-hr/demo-request', [GosorHrController::class, 'requestDemo'])
    ->middleware('throttle:contact-form')
    ->name('gosor-hr.demo');
Route::redirect('/g-hr-calendar', '/g-hr');

Route::get('/gosor-hr', [GosorHrController::class, 'index']);
Route::post('/gosor-hr/demo-request', [GosorHrController::class, 'requestDemo'])
    ->middleware('throttle:contact-form');
Route::redirect('/gosor-calendar', '/g-hr');

// Edu Bridge Routes
Route::get('/edu-bridge', [EduBridgeController::class, 'index'])->name('edu-bridge');
Route::post('/edu-bridge/demo-request', [EduBridgeController::class, 'requestDemo'])
    ->middleware('throttle:contact-form')
    ->name('edu-bridge.demo');
Route::redirect('/e-bridge', '/edu-bridge');
Route::post('/e-bridge/demo-request', [EduBridgeController::class, 'requestDemo'])
    ->middleware('throttle:contact-form');

Route::get('/test-mail', function () {
    $contact = new ContactMessage([
        'name' => 'محمد أحمد (معاينة تجريبية)',
        'email' => 'client@example.com',
        'phone' => '+201012345678',
        'company' => 'شركة جسور للحلول الرقمية',
        'project_type' => 'Gosor HR - نظام الحضور الذكي والرواتب (Professional Plan)',
        'message' => "طلب تجربة وعرض توضيحي للنظام لإدارة 50 موظف عبر الفروع.\n\nملاحظة العميل: نود معرفة إمكانية تخصيص التقارير المالية وربط نظام الرواتب.",
    ]);
    $contact->id = 1;

    return new NewContactRequestMail($contact, 'Gosor HR Demo Request');
})->name('mail.test');

Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }

    return back();
})->name('set-locale');
