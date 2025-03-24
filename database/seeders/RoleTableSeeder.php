<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'uefa_manager',
            'federation_manager',
            'federation_contact',
            'ambassador',
            'mentor',
            'prospect',
            'mentee',
        ];

        Role::truncate();

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
