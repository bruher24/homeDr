<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function create(array $attributes): Model;

    public function get(int $id): Model;

    public function getAll(): Collection;

    public function update(Model $model, array $attributes): Model;
    
    public function updateOrCreate(array $attributes): Model;

    public function delete(Model $model): bool;
}