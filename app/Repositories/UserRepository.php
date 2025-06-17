<?php

namespace App\Repositories;

use App\Exceptions\UserException;
use App\Interfaces\RepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class UserRepository implements RepositoryInterface
{
    private array $relations = [
        'roles',
        'photo',
    ];
    private array $missingRelations = [
        'doctor',
        'patient',
    ];
    public function create(array $attributes): Model
    {
        $user = new User($attributes);
        if (!$user->save()){
            throw new UserException('Error creating user.');
        }
        $user->refresh();
        $user->patient()->create();
        return $user;
    }

    public function get(int $id): Model
    {
        $user = User::with($this->relations)->find($id);
        $user->loadMissing($this->missingRelations);
        return $user;
    }

    public function getAll(): Collection
    {
        return User::with($this->relations)->get();
    }

    public function update(Model $model, array $attributes): Model
    {
        if ($model->update($attributes)) {
            return $model->refresh();
        }
        throw new UserException();
    }

    public function updateOrCreate(array $attributes): Model
    {
        $user = User::find($attributes['id']); // ???
        if ($user) {
            if ($user->update($attributes)) {
                return $user->refresh();
            }
            throw new UserException('Error updating user.');
        }
        return $this->create($attributes);

    }

    public function delete(Model $model): bool
    {
        if ($model->delete()) {
            return true;
        }
        throw new UserException('User not found');
    }
}