<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCareService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'display_order',
        'is_active',
        'purpose_html',
        'services_html',
        'benefits_html',
        'considerations_html'
    ];
    protected $casts = ['is_active' => 'boolean'];
}
