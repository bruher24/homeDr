<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['setting_id', 'user_id', 'name'];
    protected $primaryKey = 'setting_id';
    public $timestamps = false;
}
