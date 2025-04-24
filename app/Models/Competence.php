<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable = ['competence_id', 'competence_name'];
    protected $primaryKey = 'competence_id';
    public $timestamps = false;
}
