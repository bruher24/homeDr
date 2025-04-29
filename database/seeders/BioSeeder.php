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
                'text' => 'Test name 1',
                'user_id' => 1
            ],
            [
                'text' => 'Test name 1',
                'user_id' => 2
            ],
        ];
        collect($bios)->each(function ($bio) {
            Bio::create($bio);
        });
    }
}
