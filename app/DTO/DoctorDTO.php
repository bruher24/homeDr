<?php

namespace App\DTO;

class DoctorDTO
{
    public readonly int $id;
    public readonly int $user_id;
    public readonly int $stage;
    public readonly float $rating;

    public function __construct(int $id, int $user_id, int $stage, float $rating) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->stage = $stage;
        $this->rating = $rating;
    }
}