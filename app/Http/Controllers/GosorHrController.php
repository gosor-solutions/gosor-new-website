<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Services\LandingContentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GosorHrController extends Controller
{
    public function __construct(
        protected LandingContentService $landingService
    ) {}

    public function index(): View
    {
        $settings = $this->landingService->getSettings();
        $partners = $this->landingService->getActivePartners();
        $reviews = $this->landingService->getActiveReviews();

        return view('web.gosor-hr', compact('settings', 'partners', 'reviews'));
    }

    public function requestDemo(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'company' => ['required', 'string', 'max:255'],
            'employees_count' => ['nullable', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:3000'],
        ]);

        $messageContent = 'Demo Request for Gosor HR System.';
        if (! empty($validated['employees_count'])) {
            $messageContent .= ' | Number of Employees: '.$validated['employees_count'];
        }
        if (! empty($validated['message'])) {
            $messageContent .= "\n\nClient Note: ".$validated['message'];
        }

        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'],
            'project_type' => 'Gosor HR - Smart Attendance & AI System',
            'message' => $messageContent,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => app()->getLocale() === 'ar'
                    ? 'تم استلام طلبك بنجاح! سيتواصل معك أحد مستشارينا لتحديد موعد العرض التوضيحي.'
                    : 'Your demo request has been received! Our specialist will reach out shortly to schedule your live walkthrough.',
                'redirect' => route('success'),
            ]);
        }

        return redirect()->route('success')->with('success', __('Message sent successfully!'));
    }
}
