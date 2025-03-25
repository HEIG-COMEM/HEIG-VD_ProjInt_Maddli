<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

/**
 * Class RoleTableSeeder
 *
 * Seed the database with data of roles.
 */
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
            'club_manager',
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
