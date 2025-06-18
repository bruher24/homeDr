<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\User;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{
    private RepositoryInterface $repository;
    private RoleService $roleService;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->roleService = new RoleService();
    }

    public static function collectFio(User $user): string
    {
        return $user->surname . " " . $user->name . " " . $user->patronymic;
    }

    public function createUser(array $data): User
    {
        try{
            $user = $this->repository->create($data);
        }catch (UserException $e){
            logger($e->getMessage());
        }

        $user->roles()->attach($this->roleService->patient);

        return $user;
    }

    public function getUser(int $id): User
    {
        try{
            $user = $this->repository->get($id);
        } catch (ModelNotFoundException $e){
            logger($e->getMessage());
        }
        return $user;
    }


}
