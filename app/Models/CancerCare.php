<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancerCare extends Model
{
    protected $table = 'cancel_cares';
    protected $fillable = [
        'title',
        'description',
        'image1',
        'image2',
        'book_contact_no',
        'symptoms',
        'diagnosis',
        'risk_factors',
        'treatment'
 ];
}