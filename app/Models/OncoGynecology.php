<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OncoGynecology extends Model
{
    protected $table = 'onco_gynecologies';
    protected $fillable = [
        'title',
        'description',
        'image',
        'frequency',
        'methods',
        'benefits',
         'image1',
        'procedures',
        'administration',
 ];
}