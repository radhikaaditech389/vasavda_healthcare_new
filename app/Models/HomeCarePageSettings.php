<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCarePageSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'banner_image',
        'conclusion_html'
    ];
}
