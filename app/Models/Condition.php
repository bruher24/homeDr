<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = ['condition_id', 'condition_text'];
    protected $primaryKey = 'condition_id';
    public $timestamps = false;
}
