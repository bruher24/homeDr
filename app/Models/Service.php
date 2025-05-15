<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description'];
    public $timestamps = false;

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
