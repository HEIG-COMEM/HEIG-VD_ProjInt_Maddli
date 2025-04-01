<?php

namespace Database\Seeders;

use App\Models\Nation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uefaManager = User::firstOrCreate(
            [
                'email' => env('UEFA_MANAGER_EMAIL'),
            ],
            [
                'name' => 'UEFA Manager',
                'password' => Hash::make(env('UEFA_MANAGER_PASSWORD')),
                'birth_date' => '1970-01-01',
            ]
        );

        $uefaManagerRole = Role::where('name', 'uefa_manager')->first();
        if ($uefaManagerRole && !$uefaManager->roles->contains($uefaManagerRole->id)) {
            $uefaManager->roles()->attach($uefaManagerRole->id);
        }

        $nations = Nation::all();
        $nationManagerRole = Role::where(
            'name',
            'federation_manager'
        )->first();
        $federationContactRole = Role::where(
            'name',
            'federation_contact'
        )->first();
        foreach ($nations as $nation) {
            $nationManager = User::firstOrCreate(
                [
                    'email' => strtolower(str_replace(' ', '_', $nation->name)) . '@hello-coach.ch',
                ],
                [
                    'name' => $nation->name . ' Manager',
                    'password' => Hash::make('password'),
                    'birth_date' => '1970-01-01',
                ]
            );
            $nationManager->roles()->syncWithoutDetaching([$nationManagerRole->id]);
            $nation->users()->syncWithoutDetaching([$nationManager->id]);

            $federationContact = User::firstOrCreate(
                [
                    'email' => strtolower(str_replace(' ', '_', $nation->name)) . '_contact@hello-coach.ch',
                ],
                [
                    'name' => $nation->name . ' Contact',
                    'password' => Hash::make('password'),
                    'birth_date' => '1970-01-01',
                ]
            );
            $federationContact->roles()->syncWithoutDetaching([$federationContactRole->id]);
            $nation->users()->syncWithoutDetaching([$federationContact->id]);
        }
    }
}
