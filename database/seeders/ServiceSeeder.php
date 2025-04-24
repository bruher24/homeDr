<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Test name 1',
                'desc' => 'Test desc 1',
            ],
            [
                'name' => 'Test name 1',
                'desc' => 'Test desc 1',
            ],
            [
                'name' => 'Test name 1',
                'desc' => 'Test desc 1',
            ],
        ];
        collect($services)->each(function ($service) {
            Service::create($service);
        });
    }
}
