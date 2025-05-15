<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Messenger;
use Illuminate\Support\Facades\DB;

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

        DB::table('messenger_user')->insert([
            'messenger_id' => 1,
            'user_id' => 1,
            'link' => 'https://telegram.me/12345',
        ]);
    }
}
