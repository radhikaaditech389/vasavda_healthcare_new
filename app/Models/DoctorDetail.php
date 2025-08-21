<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorDetail extends Model
{
    use HasFactory;

    protected $table = 'doctor_details';

    protected $fillable = [
        'doctor_id',
        'education',
        'languages',
        'description',
        'experience',
        'extra_info',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
