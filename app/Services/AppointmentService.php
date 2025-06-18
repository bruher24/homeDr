<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;

class AppointmentService
{
    private RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create($data) {
        $this->repository->create($data);
    }
}