<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = ['speciality_id', 'speciality_name'];
    protected $primaryKey = 'speciality_id';
    public $timestamps = false;
}
