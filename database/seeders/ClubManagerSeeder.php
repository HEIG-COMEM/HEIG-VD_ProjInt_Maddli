<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class ClubManagerSeeder
 *
 * Create Users with the role of club_manager and assign them to clubs.
 */
class ClubManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = Club::inRandomOrder()->limit(10)->get();
        $role = Role::where('name', 'club_manager')->first();
        foreach ($clubs as $club) {
            $user = User::firstOrCreate(
                ['email' => strtolower(str_replace(' ', '_', $club->name)) . '@maddli.com'],
                ['name' => $club->name . ' Manager', 'password' => Hash::make('manager'), 'birth_date' => now()->subYears(30)]
            );
            $user->roles()->sync($role);

            $club->managers()->sync($user);
        }
    }
}
