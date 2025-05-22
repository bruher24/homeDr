<?php

namespace App\Models;

use App\Services\UserService;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];
    protected $appends = ['fio', 'speciality'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function email()
    {
        return $this->hasMany(Email::class);
    }

    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('price');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getFioAttribute()
    {
       return UserService::collectFio($this->user()->first());
    }

    public function getSpecialityAttribute()
    {
        return $this->specialities()->first()->name;
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class);
    }

    public function conditions()
    {
        return $this->belongsToMany(Condition::class);
    }

    public function self_conditions()
    {
        return $this->hasMany(SelfConditions::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }
}
