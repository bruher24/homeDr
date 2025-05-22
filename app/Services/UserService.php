<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function collectFio(User $user): string
    {
        return $user->surname . " " . $user->name . " " . $user->patronymic;
    }

    public static function createUser(array $data): User
    {
        $user = new User($data);
        $user->save();
        $user->refresh();
        $user->roles()->attach('3');
        $user->patient()->create();
        return $user;
    }
}
