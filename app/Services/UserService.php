<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\User;
use App\Interfaces\RepositoryInterface;

class UserService
{
    private RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function collectFio(User $user): string
    {
        return $user->surname . " " . $user->name . " " . $user->patronymic;
    }

    public function createUser(array $data): User
    {
        $user = $this->repository->create($data);

        if (!$user->save()) {
            throw new UserException('Ошибка при сохранении пользователя!');
        }

        $user->roles()->attach(RoleService::$patient);

        return $user;
    }

    public function getUser(int $id): User
    {
        $user = $this->repository->get($id);
    }


}
