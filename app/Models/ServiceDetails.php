<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetails extends Model
{
    protected $table = 'service_details';
    protected $fillable = [
        'service_id',
        'image',
        'title',
        'full_desc',
        'short_desc',
        'book_contact_no',
        'benifits',
        'faq',
    ];
    protected $casts = [
        'benifits' => 'array',
    'faq' => 'array',
];


}