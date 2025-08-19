<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $table = 'about_sections';
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'experience',
        'video_url',
        'image1',
        'image2',
        'extra',
        'languages'
    ];

    use HasFactory;
}
