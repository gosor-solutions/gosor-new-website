<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AntiSpamService
{
    /**
     * List of known disposable / temporary email domains.
     *
     * @var array<int, string>
     */
    protected array $disposableDomains = [
        'mailinator.com',
        'tempmail.com',
        '10minutemail.com',
        'guerrillamail.com',
        'guerrillamailblock.com',
        'sharklasers.com',
        'grr.la',
        'guerrillamail.info',
        'guerrillamail.biz',
        'guerrillamail.de',
        'guerrillamail.net',
        'guerrillamail.org',
        'yopmail.com',
        'yopmail.fr',
        'yopmail.net',
        'trashmail.com',
        'trashmail.net',
        'dispostable.com',
        'getairmail.com',
        'throwawaymail.com',
        'fakeinbox.com',
        'mohmal.com',
        'temp-mail.org',
        'crazymailing.com',
        'generator.email',
        'nada.ltd',
        'burnermail.io',
        'mytemp.email',
        'fakemailgenerator.com',
        'disposablemail.com',
        'inboxbear.com',
        'emailondeck.com',
        'getnada.com',
        'dropmail.me',
        'tempail.com',
        'tempinbox.com',
        'mintemail.com',
        'maildrop.cc',
        'harakirimail.com',
        'mytempemail.com',
    ];

    /**
     * List of dummy / placeholder / fake domains.
     *
     * @var array<int, string>
     */
    protected array $fakeDomains = [
        'test.com',
        'fake.com',
        'sample.com',
        'invalid.com',
        'none.com',
        'null.com',
        'asdf.com',
        'dummy.com',
        'noemail.com',
        'fakeemail.com',
        'fakemail.com',
        '123.com',
        'temp.com',
        'spam.com',
        'testing.com',
        'domain.com',
        'foobar.com',
    ];

    /**
     * List of suspicious local-part prefixes for fake emails.
     *
     * @var array<int, string>
     */
    protected array $suspiciousLocalParts = [
        'test',
        'testing',
        'fake',
        'spam',
        'asdf',
        'asdasd',
        'qwerty',
        '123456',
        '12345678',
        'dummy',
        'null',
        'none',
        'noemail',
        'fakemail',
        'aaa',
        'aaaa',
        'aaaaa',
        'abc',
        'abcdef',
    ];

    /**
     * Determine whether the incoming request contains fake or spam data.
     */
    public function isFakeSubmission(Request $request): bool
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
                Log::warning('AntiSpam: Invalid form timestamp from IP: '.$request->ip());

                return true;
            }
        }

        // 3. Fake / Invalid Email check
        $email = (string) $request->input('email', '');
        if ($email !== '' && ! $this->isRealEmail($email)) {
            Log::info('AntiSpam: Fake or disposable email detected ('.$email.') from IP: '.$request->ip());

            return true;
        }

        // 4. Fake Phone check
        $phone = (string) $request->input('phone', '');
        if ($phone !== '' && ! $this->isLegitimatePhone($phone)) {
            Log::info('AntiSpam: Fake phone number detected ('.$phone.') from IP: '.$request->ip());

            return true;
        }

        // 5. Fake Name check
        $name = (string) $request->input('name', '');
        if ($name !== '' && ! $this->isLegitimateName($name)) {
            Log::info('AntiSpam: Fake name detected ('.$name.') from IP: '.$request->ip());

            return true;
        }

        // 6. Spam keywords in message
        $message = (string) $request->input('message', '');
        if ($message !== '' && $this->containsSpamPatterns($message)) {
            Log::info('AntiSpam: Spam pattern detected in message from IP: '.$request->ip());

            return true;
        }

        // 7. Duplicate submissions check (cooldown)
        $cleanEmail = strtolower(trim($email));
        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
        $cacheKey = 'spam_cooldown_'.md5($request->ip().'_'.$cleanEmail.'_'.$cleanPhone);

        if (Cache::has($cacheKey)) {
            Log::info('AntiSpam: Duplicate submission blocked from IP: '.$request->ip().' (Email: '.$cleanEmail.')');

            return true;
        }

        return false;
    }

    /**
     * Alias for isFakeSubmission for backward compatibility.
     */
    public function isSpam(Request $request): bool
    {
        return $this->isFakeSubmission($request);
    }

    /**
     * Check if the provided email address is real, deliverable, and not fake or disposable.
     */
    public function isRealEmail(?string $email): bool
    {
        if (empty($email)) {
            return false;
        }

        $email = strtolower(trim($email));

        // 1. Basic RFC format validation
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $parts = explode('@', $email, 2);
        if (count($parts) !== 2) {
            return false;
        }

        [$localPart, $domain] = $parts;

        // 2. Reject suspicious dummy local-parts
        if (in_array($localPart, $this->suspiciousLocalParts, true)) {
            return false;
        }

        // Reject repeated single character local-part (e.g. aaaaa, 11111)
        if (preg_match('/^(.)\1{3,}$/', $localPart)) {
            return false;
        }

        // 3. Reject known disposable email domains
        if (in_array($domain, $this->disposableDomains, true)) {
            return false;
        }

        // 4. Reject known dummy / fake domains
        if (in_array($domain, $this->fakeDomains, true)) {
            return false;
        }

        // Allow test/example domains during testing environment
        if (app()->runningUnitTests() || app()->environment('testing')) {
            return true;
        }

        // 5. DNS MX / A record check for real internet delivery
        try {
            if (! checkdnsrr($domain, 'MX') && ! checkdnsrr($domain, 'A')) {
                return false;
            }
        } catch (\Throwable $e) {
            Log::debug('AntiSpam: DNS check failed for domain '.$domain.': '.$e->getMessage());
        }

        return true;
    }

    /**
     * Check if the phone number appears legitimate (not repeated digits or sequential spam).
     */
    public function isLegitimatePhone(?string $phone): bool
    {
        if (empty($phone)) {
            return true; // Phone is optional in some forms
        }

        $digits = preg_replace('/\D/', '', $phone);

        // Too short or too long
        if (strlen($digits) < 7 || strlen($digits) > 16) {
            return false;
        }

        // All identical digits (e.g. 00000000, 11111111, 99999999)
        if (preg_match('/^(.)\1{5,}$/', $digits)) {
            return false;
        }

        // Exact dummy sequences
        $exactDummyNumbers = [
            '1234567',
            '12345678',
            '123456789',
            '1234567890',
            '012345678',
            '987654321',
            '9876543210',
        ];

        if (in_array($digits, $exactDummyNumbers, true)) {
            return false;
        }

        return true;
    }

    /**
     * Check if the name appears legitimate and doesn't contain URLs or HTML.
     */
    public function isLegitimateName(?string $name): bool
    {
        if (empty($name)) {
            return false;
        }

        $trimmed = trim($name);

        if (mb_strlen($trimmed) < 2) {
            return false;
        }

        // Contains URLs or web links
        if (preg_match('/https?:\/\/|www\.|\.com|\.ru|\.xyz|\.top|\.online/i', $trimmed)) {
            return false;
        }

        // Contains HTML tags
        if (preg_match('/<[^>]*>/', $trimmed)) {
            return false;
        }

        // All identical characters (e.g. 'aaaaaa', 'zzzzzz')
        if (preg_match('/^(.)\1{4,}$/u', $trimmed)) {
            return false;
        }

        return true;
    }

    /**
     * Check if message text contains common spam/bot keywords.
     */
    protected function containsSpamPatterns(string $message): bool
    {
        $spamKeywords = [
            'viagra',
            'cialis',
            'casino',
            'cryptocurrency investment',
            'crypto giveaway',
            'telegram:',
            't.me/',
            'whatsapp group invite',
            'earn money fast',
            'seo backlink',
            'buy backlinks',
            'adult dating',
            'porn',
            'xxx',
        ];

        $lowerMessage = mb_strtolower($message);

        foreach ($spamKeywords as $keyword) {
            if (str_contains($lowerMessage, $keyword)) {
                return true;
            }
        }

        // Too many links in a single contact message (more than 2 links)
        $linkCount = preg_match_all('/https?:\/\//i', $message);
        if ($linkCount > 2) {
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
