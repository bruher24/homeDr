<?php

namespace App\Models;

use App\Services\UserService;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];
    protected $appends = ['fio'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function email()
    {
        return $this->hasOne(Email::class);
    }

    public function anamnesis()
    {
        return $this->hasMany(Anamnesis::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function diagnoses()
    {
        return $this->belongsToMany(Diagnosis::class)->withPivot('actuality');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getFioAttribute()
    {
        return UserService::collectFio($this->user()->first());
    }
}
