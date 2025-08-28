<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sonography extends Model
{
    use HasFactory;

    protected $table = 'sonographies';

    protected $fillable = [
        'title',
        'description',
        'image',
        'sonography_detail',
        'sonography_image1',
        'sonography_image2',
        'sonography_image3',
        'benifits'
    ];

   
}