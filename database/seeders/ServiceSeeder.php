<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['service_type' => 'Test service 1'],
            ['service_type' => 'Test service 2'],
            ['service_type' => 'Test service 3'],
        ];
        collect($services)->each(function ($service) {
            Service::create($service);
        });
    }
}
