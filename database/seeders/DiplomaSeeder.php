<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DiplomaSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = Doctor::find(1);
        $doctor->diplomas()->createMany([
            [
                'name' => 'С шараги корочка',
                'src' => '/pomoyka/diplom.pdf'
            ],
            [
                'name' => 'Куплено в переходе',
                'src' => '/temp/trash/perexod.pdf'
            ],
        ]);
    }
}
