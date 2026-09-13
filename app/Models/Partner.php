<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Partner extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'logo',
        'is_active',
        'order',
    ];

    public $translatable = ['name'];

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('landing.partners'));
        static::deleted(fn () => Cache::forget('landing.partners'));
    }

    /**
     * Get the resolved URL for the partner logo.
     */
    public function getLogoUrlAttribute(): ?string
    {
        if (! empty($this->logo)) {
            if (Storage::disk('public')->exists($this->logo)) {
                return asset('storage/'.$this->logo);
            }

            if (file_exists(public_path($this->logo))) {
                return asset($this->logo);
            }

            $basename = basename($this->logo);
            if (file_exists(public_path('images/gosor/partners/'.$basename))) {
                return asset('images/gosor/partners/'.$basename);
            }

            if (file_exists(public_path('images/gosor/'.$this->logo))) {
                return asset('images/gosor/'.$this->logo);
            }
        }

        return null;
    }
}
