<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    public function run(): void
    {
        $conditions = [
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
        collect($conditions)->each(function ($condition) {
            Condition::create($condition);
        });
    }
}
