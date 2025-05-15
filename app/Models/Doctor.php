<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function speciality()
    {
        return $this->belongsToMany(Speciality::class, 'doctors_specialities', 'doctor_id', 'speciality_id');
    }

    public function email()
    {
        return $this->hasMany(Email::class);
    }

    public function diploma()
    {
        return $this->hasMany(Diploma::class);
    }

    public function anamnesis()
    {
        return $this->hasMany(Anamnesis::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
