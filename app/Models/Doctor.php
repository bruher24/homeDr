<?php

namespace App\Models;

use App\Services\UserService;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];
    protected $appends = ['fio'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function speciality()
    {
        return $this->belongsToMany(Speciality::class);
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

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
