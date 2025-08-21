<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = ['logo_image', 'description', 'address', 'phone_no', 'email', 'days', 'hospital_time', 'consulting_time', 'special_time', 'yt_link', 'insta_link'];

    use HasFactory;
}
