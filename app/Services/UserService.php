<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function collectFio(User $user): string
    {
        return $user->surname . " " . $user->name . " " . $user->patronymic;
    }
}
