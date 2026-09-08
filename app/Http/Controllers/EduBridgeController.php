<?php

namespace App\Http\Controllers;

use App\Mail\NewContactRequestMail;
use App\Models\ContactMessage;
use App\Services\AntiSpamService;
use App\Services\LandingContentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EduBridgeController extends Controller
{
    public function __construct(
        protected LandingContentService $landingService
    ) {}

    public function index(): View
    {
        $settings = $this->landingService->getSettings();
        $partners = $this->landingService->getActivePartners();
        $reviews = $this->landingService->getActiveReviews();

        return view('web.edu-bridge', compact('settings', 'partners', 'reviews'));
    }

    public function requestDemo(Request $request, AntiSpamService $antiSpamService): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'institution_type' => ['nullable', 'string', 'max:100'],
            'students_count' => ['nullable', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:3000'],
            '_hp_company_website' => ['nullable', 'string'],
        ]);

        $successMsg = app()->getLocale() === 'ar'
            ? 'تم استلام طلبك بنجاح! سيتواصل معك أحد خبرائنا لتقديم عرض توضيحي مباشر لمنظومة Edu Bridge.'
            : 'Your request has been received! Our specialist will reach out shortly to schedule your live walkthrough of Edu Bridge.';

        // Silent handling for spam bots
        if ($antiSpamService->isSpam($request)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMsg,
                    'redirect' => route('success'),
                ]);
            }

            return redirect()->route('success')->with('success', __('Message sent successfully!'));
        }

        $messageContent = 'Demo & Consultation Request for Edu Bridge Platform.';
        if (! empty($validated['institution_type'])) {
            $messageContent .= ' | Institution Type: '.$validated['institution_type'];
        }
        if (! empty($validated['students_count'])) {
            $messageContent .= ' | Expected Students / Plan: '.$validated['students_count'];
        }
        if (! empty($validated['message'])) {
            $messageContent .= "\n\nClient Note: ".$validated['message'];
        }

        $contact = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['institution_type'] ?? 'Academy / Educational Institution',
            'project_type' => 'Edu Bridge - Academic & LMS Platform',
            'message' => $messageContent,
        ]);

        $antiSpamService->recordSubmission($request);

        try {
            $adminEmail = config('mail.admin_recipient', env('CONTACT_NOTIFICATION_EMAIL', 'mahfouzm25@gmail.com'));
            Mail::to($adminEmail)->send(new NewContactRequestMail($contact, 'Edu Bridge Demo Request'));
        } catch (\Throwable $e) {
            Log::error('Failed to send Edu Bridge demo notification email: '.$e->getMessage());
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $successMsg,
                'redirect' => route('success'),
            ]);
        }

        return redirect()->route('success')->with('success', __('Message sent successfully!'));
    }
}
