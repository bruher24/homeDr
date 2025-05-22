<?php

namespace Database\Seeders;

use App\Models\Anamnesis;
use Illuminate\Database\Seeder;

class AnamnesisSeeder extends Seeder
{
    public function run(): void
    {
        Anamnesis::create([
            'text' => 'Чет был, потом чет помер'
        ]);
    }
}
