<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = ['diagnosis_id', 'diagnosis_name', 'diagnosis_desc'];
    protected $primaryKey = 'diagnosis_id';
    public $timestamps = false;
}
