<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\League;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            $res = Nation::where('code', $code)->first();
            if (!$res) {
                $res = Nation::create([
                    'name' => $nation['name'],
                    'code' => $code,
                ]);
            }

            foreach ($nation['leagues'] as $leagueName => $clubs) {
                $league = League::where('name', $leagueName)->first();
                if (!$league) {
                    $league = new League();
                    $league->name = $leagueName;
                    $league->save();
                }

                $res->leagues()->save($league);

                foreach ($clubs as $clubName) {
                    $club = Club::where('name', $clubName)->first();
                    if (!$club) {
                        $club = new Club();
                        $club->name = $clubName;
                        $club->save();
                    }

                    //$league->clubs()->save($club); //TODO: uncomment this line when the relationship is defined
                }
            }
        }
    }
}
