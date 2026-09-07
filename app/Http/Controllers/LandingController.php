<?php

namespace App\Http\Controllers;

use App\Mail\NewContactRequestMail;
use App\Models\ContactMessage;
use App\Services\LandingContentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    protected $landingService;

    public function __construct(LandingContentService $landingService)
    {
        $this->landingService = $landingService;
    }

    public function index()
    {
        $services = $this->landingService->getActiveServices();
        $platforms = $this->landingService->getActivePlatforms();
        $portfolios = $this->landingService->getActivePortfolios();
        $reviews = $this->landingService->getActiveReviews();
        $partners = $this->landingService->getActivePartners();
        $settings = $this->landingService->getSettings();

        return view('web.landing', compact('services', 'platforms', 'portfolios', 'reviews', 'partners', 'settings'));
    }

    // TODO: convert into a form request
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = ContactMessage::create($validated);

        try {
            $adminEmail = config('mail.admin_recipient', env('CONTACT_NOTIFICATION_EMAIL', 'mahfouzm25@gmail.com'));
            Mail::to($adminEmail)->send(new NewContactRequestMail($contact, 'Landing Page Form'));
        } catch (\Throwable $e) {
            Log::error('Failed to send contact notification email: '.$e->getMessage());
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => __('Message sent successfully!'),
                'redirect' => route('success'),
            ]);
        }

        return back()->with('success', __('Message sent successfully!'));
    }

    public function privacyPolicy()
    {
        $settings = $this->landingService->getSettings();

        return view('web.policy', compact('settings'));
    }
}
