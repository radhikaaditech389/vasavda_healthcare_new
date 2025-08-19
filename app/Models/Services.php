<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientServices;

class Services extends Model
{
    protected $table = 'services';
    protected $fillable = ['service_name', 'service_image', 'service_link'];

    public function patientServices()
    {
        return $this->hasMany(PatientServices::class, 'service_id');
    }

    use HasFactory;
}
