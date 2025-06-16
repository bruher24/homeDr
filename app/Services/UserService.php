<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function collectFio(User $user): string
    {
        return $user->surname . " " . $user->name . " " . $user->patronymic;
    }

    public function createUser(array $data): User
    {
        $user = $this->userRepository->create($data);

        if (!$user->save()) {
            throw new UserException('Ошибка при сохранении пользователя!');
        }

        $user->roles()->attach(RoleService::$patient);

        return $user;
    }

    public function getUser(int $id): User
    {
        $user = $this->userRepository->get($id);
    }


}
