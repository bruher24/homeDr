<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class PatientRepository implements RepositoryInterface
{
    private array $relations = [
        'roles',
        'photo',
    ];

    public function create(array $attributes): Model
    {
        // TODO: Implement create() method.
    }

    public function get(int $id): Model
    {
        // TODO: Implement get() method.
    }

    public function getAll(): Collection
    {
        // TODO: Implement getAll() method.
    }

    public function update(Model $model, array $attributes): Model
    {
        // TODO: Implement update() method.
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