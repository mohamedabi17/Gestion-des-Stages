<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for etudiant registration with promotion
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'etudiant',
        ]);

        // Seed data for admin registration
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'admin',
        ]);

        // Seed data for pilotedestage registration
        User::create([
            'name' => 'Pilote Destage User',
            'email' => 'pilote@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'pilotedestage',
        ]);

        // Seed data for entreprise registration
        User::create([
            'name' => 'Entreprise User',
            'email' => 'entreprise@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'entreprise',
        ]);

        // Add more seed data as needed
    }
}
