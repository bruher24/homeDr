<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['skill_id', 'skill_name'];
    protected $primaryKey = 'skill_id';
    public $timestamps = false;
}
