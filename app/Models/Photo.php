<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['src'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
