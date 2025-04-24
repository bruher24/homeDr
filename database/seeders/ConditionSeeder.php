<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    public function run(): void
    {
        $conditions = [
            ['condition_text' => 'Test condition 1'],
            ['condition_text' => 'Test condition 2'],
            ['condition_text' => 'Test condition 3'],
        ];
        collect($conditions)->each(function ($condition) {
            Condition::create($condition);
        });
    }
}
