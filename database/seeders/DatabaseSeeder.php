<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleTableSeeder::class,
            LicenceTableSeeder::class,
            RelationTypeSeeder::class,
            DataSeeder::class,
            CoachingSeeder::class,
            ClubManagerSeeder::class,
            RelationSeeder::class,
            MessageSeeder::class,

            AccountsSeeder::class,
        ]);
    }
}
