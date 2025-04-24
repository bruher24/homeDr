<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service_id', 'service_type'];
    protected $primaryKey = 'service_id';
    public $timestamps = false;
}
