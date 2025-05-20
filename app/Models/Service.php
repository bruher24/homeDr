<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'desc', 'min_price'];
    public $timestamps = false;

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
