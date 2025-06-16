<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\User;
use Exception;

class UserService
{
    public static function collectFio(User $user): string
    {
        return $user->surname . " " . $user->name . " " . $user->patronymic;
    }

    public static function createUser(array $data): User
    {
        $user = new User($data);
        if (!$user->save()) {
            throw new UserException('Ошибка при сохранении пользователя!');
        }
        $user->refresh();
        $user->roles()->attach(RoleService::$patient);
        $user->patient()->create();
        return $user;
    }


}
