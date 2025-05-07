<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    public function bio()
    {
        return $this->hasOne(Bio::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function settings()
    {
        return $this->belongsToMany(Setting::class, 'users_settings', 'user_id', 'setting_id');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }

    public function switchType(): void
    {
        if ($this->doctor()) {
            DB::table('users_roles')->where('user_id', '=', $this->id)->update(['role_id' => 3]);
            $this->doctor()->delete();
            $this->patient()->create();
        }

        if ($this->patient()) {
            DB::table('users_roles')->where('user_id', '=', $this->id)->update(['role_id' => 2]);
            $this->patient()->delete();
            $this->doctor()->create();
        }
    }
}
