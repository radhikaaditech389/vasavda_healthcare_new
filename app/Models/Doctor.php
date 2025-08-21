<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'specialization',
        'image'
    ];

    public function details()
    {
        return $this->hasOne(DoctorDetail::class);
    }

    use HasFactory;
}
