<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Test role 1'],
            ['name' => 'Test role 2'],
            ['name' => 'Test role 3'],
        ];
        collect($roles)->each(function ($role) {
            Role::create($role);
        });
    }
}
