<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        }

        return null;
    }
}
