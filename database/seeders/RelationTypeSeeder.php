<?php

namespace Database\Seeders;

use App\Models\RelationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Class RelationTypeSeeder
 *
 * Seed the database with data of relation types, used to define the type of relationship between users.
 */
class RelationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relationTypes = [
            ['name' => 'Mentor / Mentee'],
            ['name' => 'Ambassador / Prospect'],
        ];

        foreach ($relationTypes as $relationType) {
            RelationType::firstOrCreate($relationType);
        }
    }
}
