<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    protected $fillable = ['messenger_id', 'type', 'login'];
    protected $primaryKey = 'messenger_id';
    public $timestamps = false;
}
