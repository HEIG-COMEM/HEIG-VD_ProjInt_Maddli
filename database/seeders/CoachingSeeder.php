<?php

namespace Database\Seeders;

use App\Models\ClubLeague;
use App\Models\Coaching;
use App\Models\Licence;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class CoachingSeeder
 *
 * Create users assign them a coaching licence and assign them to a club league.
 * This seeder handle the creation of actual coaching data.
 */
class CoachingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)->create();

        $users = User::all();
        $licences = Licence::all();

        foreach ($users as $user) {

            // Assign a random licence to the user. Each user should have a licence for coaching.
            $user->licence_id = $licences->random()->id;
            $user->save();

            $clubLeague = ClubLeague::inRandomOrder()->first();
            Coaching::firstOrCreate([
                'club_league_id' => $clubLeague->id,
                'user_id' => $user->id,
            ]);

            $randomNumber = mt_rand(1, 10);
            if ($randomNumber <= 3) {
                $secondClubLeague = ClubLeague::inRandomOrder()->first();
                Coaching::firstOrCreate([
                    'club_league_id' => $secondClubLeague->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
