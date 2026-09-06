<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Portfolio extends Model
{
    use HasTranslations;

    protected $fillable = [
        'image',
        'name',
        'description',
        'link',
        'badge',
        'is_active',
        'order',
    ];

    public $translatable = ['name', 'description', 'badge'];

    /**
     * Get the resolved URL for the portfolio image, or fall back to default illustration.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (! empty($this->image)) {
            if (Storage::disk('public')->exists($this->image)) {
                return asset('storage/'.$this->image);
            }

            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }
        }

        // Return default placeholder if exists
        if (file_exists(public_path('images/gosor/portfolio/default.jpg'))) {
            return asset('images/gosor/portfolio/default.jpg');
        }

        return null;
    }
}
