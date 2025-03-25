<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\League;
use Illuminate\Database\Seeder;
use App\Models\Nation;

/**
 * Class DataSeeder
 *
 * Seed the database with data of countries, leagues, and clubs.
 */
class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nationsData = json_decode(file_get_contents(database_path('data/clubs.json')), true);

        foreach ($nationsData as $nationCode => $nationData) {
            $nation = Nation::updateOrCreate(
                ['code' => $nationCode],
                ['name' => $nationData['name']]
            );

            foreach ($nationData['leagues'] as $leagueName => $clubs) {
                $league = League::updateOrCreate(
                    ['name' => $leagueName]
                );

                $league->nation()->associate($nation);
                $league->save();

                foreach ($clubs as $clubName) {
                    $club = Club::updateOrCreate(
                        ['name' => $clubName]
                    );

                    $club->leagues()->syncWithoutDetaching($league);
                }
            }
        }
    }
}
