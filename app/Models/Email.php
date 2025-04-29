<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['email_id', 'email'];
    protected $primaryKey = 'email_id';
    public $timestamps = false;
}
