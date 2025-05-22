<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Messenger;

class MessengerSeeder extends Seeder
{
    public function run(): void
    {
        $messengers = [
            [
                'name' => 'telegram',
            ],
            [
                'name' => 'vk',
            ],
            [
                'name' => 'discord',
            ],
        ];
        collect($messengers)->each(function ($messenger) {
            Messenger::create($messenger);
        });
    }
}
