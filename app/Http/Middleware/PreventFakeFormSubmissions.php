<?php

namespace App\Http\Middleware;

use App\Services\AntiSpamService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PreventFakeFormSubmissions
{
    public function __construct(
        protected AntiSpamService $antiSpamService
    ) {}

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $blockedKey = 'blocked_ip_'.$ip;

        // 1. Check if the IP is already blocked
        if (Cache::has($blockedKey)) {
            Log::warning("Blocked IP [{$ip}] attempted request to: ".$request->fullUrl());

            $isAr = app()->getLocale() === 'ar' || $request->input('lang') === 'ar';
            $msg = $isAr
                ? 'تم حظر هذا العنوان مؤقتاً بسبب تكرار إرسال بيانات وهمية أو نشاط غير مصرح به.'
                : 'Access blocked temporarily due to repeated invalid/fake submissions.';

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $msg,
                    'blocked' => true,
                ], 403);
            }

            abort(403, $msg);
        }

        // 2. Only inspect POST/PUT submissions containing form data
        if ($request->isMethod('POST') || $request->isMethod('PUT')) {
            if ($this->antiSpamService->isFakeSubmission($request)) {
                $strikesKey = 'fake_form_strikes_'.$ip;
                $strikes = (int) Cache::get($strikesKey, 0) + 1;
                Cache::put($strikesKey, $strikes, now()->addMinute());

                Log::info("AntiSpam Middleware: Fake submission strike #{$strikes} within 1 minute from IP [{$ip}]");

                // If more than 3 fake submissions within 1 minute -> Block IP for 60 minutes
                if ($strikes > 3) {
                    Cache::put($blockedKey, true, now()->addMinutes(60));
                    Log::warning("AntiSpam Middleware: IP [{$ip}] BLOCKED for 60 minutes (> 3 fake submissions/min).");

                    $isAr = app()->getLocale() === 'ar' || $request->input('lang') === 'ar';
                    $blockedMsg = $isAr
                        ? 'تم حظر هذا العنوان لتكرار إرسال بيانات غير صحيحة أكثر من 3 مرات في الدقيقة.'
                        : 'Your IP has been blocked due to exceeding 3 fake submissions within one minute.';

                    if ($request->expectsJson() || $request->ajax()) {
                        return response()->json([
                            'success' => false,
                            'message' => $blockedMsg,
                            'blocked' => true,
                        ], 403);
                    }

                    abort(403, $blockedMsg);
                }

                // If strikes <= 3, silently trap fake submission without persisting to DB or emailing
                $successMsg = app()->getLocale() === 'ar'
                    ? 'تم استلام رسالتك بنجاح!'
                    : 'Message sent successfully!';

                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => true,
                        'message' => $successMsg,
                        'redirect' => route('success'),
                    ]);
                }

                return redirect()->route('success')->with('success', $successMsg);
            }
        }

        return $next($request);
    }
}
