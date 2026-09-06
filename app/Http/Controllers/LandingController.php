<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Services\LandingContentService;
use Illuminate\Http\Request;

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

        ContactMessage::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => __('Message sent successfully!'),
                'redirect' => route('success'),
            ]);
        }

        return back()->with('success', __('Message sent successfully!'));
    }
}
