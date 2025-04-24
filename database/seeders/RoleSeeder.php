<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['role' => 'Test role 1'],
            ['role' => 'Test role 2'],
            ['role' => 'Test role 3'],
        ];
        collect($roles)->each(function ($role) {
            Role::create($role);
        });
    }
}
