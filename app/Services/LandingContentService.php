<?php

namespace App\Services;

use App\Models\Partner;
use App\Models\Service;
use App\Models\Platform;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class LandingContentService
{
    public function getActivePartners(): Collection
    {
        return Cache::remember('landing.partners', 86400, fn() => Partner::where('is_active', true)->orderBy('order')->get());
    }

    public function getActiveServices(): Collection
    {
        return Cache::remember('landing.services', 86400, fn() => Service::where('is_active', true)->orderBy('order')->get());
    }

    public function getActivePlatforms(): Collection
    {
        return Cache::remember('landing.platforms', 86400, fn() => Platform::where('is_active', true)->orderBy('order')->get());
    }

    public function getActivePortfolios(): Collection
    {
        return Cache::remember('landing.portfolios', 86400, fn() => Portfolio::where('is_active', true)->orderBy('order')->get());
    }

    public function getActiveReviews(): Collection
    {
        return Cache::remember('landing.reviews', 86400, fn() => Review::where('is_active', true)->latest()->get());
    }

    public function getSettings(): Collection
    {
        return Cache::remember('landing.settings', 86400, fn() => Setting::all()->pluck('value', 'key'));
    }

    public function getSetting(string $key, $default = null)
    {
        return $this->getSettings()->get($key, $default);
    }
}
