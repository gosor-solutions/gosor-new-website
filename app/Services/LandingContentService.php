<?php

namespace App\Services;

use App\Models\Service;
use App\Models\Platform;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Support\Collection;

class LandingContentService
{
    public function getActiveServices(): Collection
    {
        return Service::where('is_active', true)->orderBy('order')->get();
    }

    public function getActivePlatforms(): Collection
    {
        return Platform::where('is_active', true)->orderBy('order')->get();
    }

    public function getActivePortfolios(): Collection
    {
        return Portfolio::where('is_active', true)->orderBy('order')->get();
    }

    public function getActiveReviews(): Collection
    {
        return Review::where('is_active', true)->latest()->get();
    }

    public function getSettings(): Collection
    {
        return Setting::all()->pluck('value', 'key');
    }

    public function getSetting(string $key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}
