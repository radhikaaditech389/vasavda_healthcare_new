<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientServices extends Model
{
    protected $table = 'patient_services';
    protected $fillable = ['service_id', 'patient_service_name'];

    public function service()
    {
        return $this->belongsTo(Services::class);
    }

    use HasFactory;
}
