<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'tbl_appointment_list';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'area',
        'appointment_date',
        'message'
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
    ];
}
