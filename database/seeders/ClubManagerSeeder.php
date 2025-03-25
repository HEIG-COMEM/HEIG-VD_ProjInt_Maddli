<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\User;

class ClubManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = Club::inRandomOrder()->limit(10)->get();
        foreach ($clubs as $club) {
            $user = User::firstOrCreate(
                ['email' => strtolower(str_replace(' ', '_', $club->name)) . '@maddli.com'],
                ['name' => $club->name . ' Manager', 'password' => bcrypt('manager'), 'birth_date' => now()->subYears(30)]
            );

            $club->managers()->sync($user);
        }
    }
}
