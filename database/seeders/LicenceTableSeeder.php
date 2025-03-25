<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Licence;

class licenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $licences = [
            'C1',
            'C2',
            'C3',
            'C4',
        ];

        Licence::truncate();

        foreach ($licences as $licence) {
            Licence::firstOrCreate([
                'name' => $licence,
            ]);
        }
    }
}
