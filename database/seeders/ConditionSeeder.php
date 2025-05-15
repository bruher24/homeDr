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
                'name' => 'Только онлайн',
                'desc' => 'без личных приемов',
            ],
            [
                'name' => 'Только очно',
                'desc' => 'без онлайна',
            ],
            [
                'name' => 'Только дискорд',
                'desc' => 'не отвлекаясь от главного',
            ],
        ];
        collect($conditions)->each(function ($condition) {
            Condition::create($condition);
        });
    }
}
