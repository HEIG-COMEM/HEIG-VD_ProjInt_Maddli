<?php

namespace Database\Seeders;

use App\Models\Licence;
use App\Models\RelationType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

/**
 * Class RelationSeeder
 *
 * Seed the database with relations between users.
 * Create new prospects and coaches, and attach them to the ambassador and mentor roles.
 * Create conversations between prospects and ambassadors, and between coaches and mentors.
 */
class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coachesRoles = Role::where('name', 'ambassador')->orWhere('name', 'mentor');
        $actualCoaches = User::has('coaching')->get();
        foreach ($actualCoaches as $coach) {

            // in 20% of cases skip attaching a role
            if (rand(1, 5) === 1) continue;

            $coach->roles()->syncWithoutDetaching($coachesRoles->get()->random());
        }

        $newProspects = User::factory()->count(10)->create();
        $newCoaches = User::factory()->count(10)->create();
        $newCoaches->each(function ($coach) {
            $coach->licence_id = Licence::all()->random()->id;
            $coach->save();
        });

        // for each new prospect, find a coach with the ambassador role and create a conversation
        $newProspects->each(function ($prospect) {
            // set the role prospect
            $prospect->roles()->syncWithoutDetaching(Role::where('name', 'prospect')->first());
            // find a coach with the ambassador role
            $coach = User::whereHas('roles', function (Builder $query) {
                $query->where('name', 'ambassador');
            })->get()->random();

            $relation = RelationType::where('name', 'Ambassador / Prospect')->first();
            $prospect->conversations()->create([
                'user_one_id' => $prospect->id,
                'user_two_id' => $coach->id,
                'relation_type_id' => $relation->id,
            ]);
        });

        // for each new coach, find a coach with the mentor role and create a conversation
        $newCoaches->each(function ($coach) {
            // set the role mentee
            $coach->roles()->syncWithoutDetaching(Role::where('name', 'mentee')->first());
            // find a coach with the mentor role
            $mentor = User::whereHas('roles', function (Builder $query) {
                $query->where('name', 'mentor');
            })->get()->random();

            $relation = RelationType::where('name', 'Mentor / Mentee')->first();
            $coach->conversations()->create([
                'user_one_id' => $coach->id,
                'user_two_id' => $mentor->id,
                'relation_type_id' => $relation->id,
            ]);
        });
    }
}
