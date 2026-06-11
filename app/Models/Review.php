<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'job_position',
        'content',
        'is_active',
    ];

    public $translatable = ['name', 'job_position', 'content'];
}
