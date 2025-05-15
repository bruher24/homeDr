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
                'name' => 'Первая консультация',
                'desc' => 'в первый класс',
            ],
            [
                'name' => 'Регулярный прием',
                'desc' => 'когда во второй-третий',
            ],
            [
                'name' => 'Занятие',
                'desc' => 'обучение чему-то например',
            ],
        ];
        collect($services)->each(function ($service) {
            Service::create($service);
        });
    }
}
