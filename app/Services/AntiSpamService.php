<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AntiSpamService
{
    /**
     * Determine whether the incoming request is considered spam or automated bot submission.
     */
    public function isSpam(Request $request): bool
    {
        // 1. Honeypot check: invisible input filled by bots
        if (! empty($request->input('_hp_company_website'))) {
            Log::info('AntiSpam: Blocked bot honeypot submission from IP: '.$request->ip());

            return true;
        }

        // 2. Fast-submission check: Bots submit instantly (under 2 seconds)
        $formTime = $request->input('_form_time');
        if ($formTime) {
            try {
                $decryptedTime = (int) decrypt($formTime);
                $elapsedSeconds = time() - $decryptedTime;

                if ($elapsedSeconds < 2) {
                    Log::info('AntiSpam: Blocked fast bot submission ('.$elapsedSeconds.'s) from IP: '.$request->ip());

                    return true;
                }
            } catch (\Throwable $e) {
                // If timestamp is tampered with or invalid
                Log::warning('AntiSpam: Invalid form timestamp from IP: '.$request->ip());
            }
        }

        // 3. Duplicate submissions check (cooldown)
        $email = strtolower(trim((string) $request->input('email', '')));
        $phone = preg_replace('/[^0-9]/', '', (string) $request->input('phone', ''));
        $cacheKey = 'spam_cooldown_'.md5($request->ip().'_'.$email.'_'.$phone);

        if (Cache::has($cacheKey)) {
            Log::info('AntiSpam: Duplicate submission blocked from IP: '.$request->ip().' (Email: '.$email.')');

            return true;
        }

        return false;
    }

    /**
     * Mark the submission as processed in cache cooldown (45 seconds).
     */
    public function recordSubmission(Request $request): void
    {
        $email = strtolower(trim((string) $request->input('email', '')));
        $phone = preg_replace('/[^0-9]/', '', (string) $request->input('phone', ''));
        $cacheKey = 'spam_cooldown_'.md5($request->ip().'_'.$email.'_'.$phone);

        Cache::put($cacheKey, true, now()->addSeconds(45));
    }
}
