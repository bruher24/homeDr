<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service_id', 'name', 'description'];
    protected $primaryKey = 'service_id';
    public $timestamps = false;
}
