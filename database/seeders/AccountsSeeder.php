<?php

namespace Database\Seeders;

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
        $ueafaManager = User::firstOrCreate([
            'name' => 'UEFA Manager',
            'email' => env('UEFA_MANAGER_EMAIL'),
            'password' => Hash::make(env('UEFA_MANAGER_PASSWORD')),
            'birth_date' => '1970-01-01',
        ]);

        $ueafaManager->roles()->attach(Role::class::where('name', 'uefa_manager')->first());
    }
}
