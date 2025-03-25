<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\League;
use Illuminate\Database\Seeder;
use App\Models\Nation;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(database_path('data/clubs.json')), true);

        foreach ($data as $code => $nation) {
            $res = Nation::firstOrCreate(
                ['code' => $code],
                ['name' => $nation['name']]
            );

            foreach ($nation['leagues'] as $leagueName => $clubs) {
                $league = League::firstOrCreate(
                    ['name' => $leagueName]
                );

                $res->leagues()->save($league);

                foreach ($clubs as $clubName) {
                    $club = Club::firstOrCreate(
                        ['name' => $clubName]
                    );

                    $league->clubs()->save($club);
                }
            }
        }
    }
}
