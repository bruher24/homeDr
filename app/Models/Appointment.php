<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $fillable = ['doctor_id', 'patient_id', 'service_id', 'date', 'time'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
