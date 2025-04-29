<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['phone_id', 'user_id', 'number'];
    protected $primaryKey = 'phone_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
