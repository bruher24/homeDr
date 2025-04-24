<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role_id', 'role'];
    protected $primaryKey = 'role_id';
    public $timestamps = false;
}
