<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements RepositoryInterface
{

    public function create(array $attributes): Model
    {
        $user = new User($attributes);
        $user->save();
        $user->refresh();
        $user->patient()->create();
    }

    public function get(int $id): Model
    {
        $user = User::find($id);
        $user->load([]);
        return $user;
    }

    public function getAll(): Collection
    {
        return User::all();
    }

    public function update(Model $model, array $attributes): Model
    {
        $model->update($attributes);
        return $model->refresh();
    }

    public function updateOrCreate(array $attributes): Model
    {
        // TODO: Implement updateOrCreate() method.
    }

    public function delete(Model $model): bool
    {
        // TODO: Implement delete() method.
    }
}