<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
