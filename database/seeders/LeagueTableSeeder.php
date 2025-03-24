<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\Nation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeagueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leagues = [
            [
                'name' => '1st League Classic',
                'nation_code' => 'CHE',
            ],
            [
                'name' => '2nd League Interregional',
                'nation_code' => 'CHE',
            ],
            [
                'name' => '2. Liga',
                'nation_code' => 'CHE',
            ],
            [
                'name' => '3. Liga',
                'nation_code' => 'CHE',
            ],
            [
                'name' => '4. Liga',
                'nation_code' => 'CHE',
            ],
            [
                'name' => '5. Liga',
                'nation_code' => 'CHE',
            ],
        ];

        League::truncate();

        foreach ($leagues as $league) {
            $nation = Nation::where('code', $league['nation_code'])->first();

            $league = new League([
                'name' => $league['name'],
            ]);

            $nation->leagues()->save($league);
        }
    }
}
