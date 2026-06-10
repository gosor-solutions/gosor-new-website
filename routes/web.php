<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

Route::get('/', function (Request $request) {
    $locale = $request->query('lang', session('locale', config('app.locale')));
    
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    } else {
        App::setLocale(session('locale', config('app.locale')));
    }
    
    return view('landing');
})->name('home');

