<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = ['name', 'desc'];
    public $timestamps = false;

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }
}
