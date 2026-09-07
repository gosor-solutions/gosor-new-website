<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('contact-form', function (Request $request) {
            return [
                Limit::perMinute(3)->by($request->ip())->response(function () {
                    $isAr = app()->getLocale() === 'ar' || request()->input('lang') === 'ar';
                    $msg = $isAr
                        ? 'تم إرسال عدة طلبات خلال وقت قصير. يرجى الانتظار دقيقة قبل المحاولة مرة أخرى.'
                        : 'Too many requests sent in a short time. Please wait a minute before trying again.';

                    if (request()->expectsJson() || request()->ajax()) {
                        return response()->json([
                            'success' => false,
                            'message' => $msg,
                        ], 429);
                    }

                    return back()->withErrors(['rate_limit' => $msg]);
                }),
                Limit::perHour(15)->by($request->ip()),
            ];
        });
    }
}
