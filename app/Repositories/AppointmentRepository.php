<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AppointmentRepository implements RepositoryInterface
{

    public function create(array $attributes): Model
    {
        $appointment = new Appointment($attributes);
        if ($attributes->patient_id) {
            $appointment->patient_id = $attributes->patient_id;
        } else {

        }
        $appointment->save();
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