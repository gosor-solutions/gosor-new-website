<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Platform extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'features',
        'is_active',
        'order',
    ];

    public $translatable = ['name', 'description', 'features'];

    protected $casts = [
        'features' => 'array',
    ];
}
