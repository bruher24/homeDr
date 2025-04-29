<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    protected $fillable = ['type', 'login'];
    public $timestamps = false;
}
