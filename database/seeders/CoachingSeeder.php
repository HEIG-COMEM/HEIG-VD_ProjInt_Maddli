<?php

namespace Database\Seeders;

use App\Models\ClubLeague;
use App\Models\Coaching;
use App\Models\User;
use Illuminate\Database\Seeder;

class CoachingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $clubLeague = ClubLeague::inRandomOrder()->first();
            Coaching::firstOrCreate([
                'club_league_id' => $clubLeague->id,
                'user_id' => $user->id,
            ]);
        }
    }
}
