<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bio;

class BioSeeder extends Seeder
{
    public function run(): void
    {
        $bios = [
            [
                'text' => 'Самый главный',
                'user_id' => 1
            ],
            [
                'text' => 'черт какой-то',
                'user_id' => 2
            ],
        ];
        collect($bios)->each(function ($bio) {
            Bio::create($bio);
        });
    }
}
