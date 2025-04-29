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
}
