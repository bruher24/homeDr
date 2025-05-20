<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
