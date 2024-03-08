<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_etudiant_registration_with_promotion()
    {
        $response = $this->post('/User/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'usertype' => 'etudiant',
            'promotion' => 'Some Promotion',
        ]);

        $response->assertRedirect('/etudiant'); // Change the redirect URL as per your application logic
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
        $this->assertDatabaseHas('etudiants', ['name' => 'John Doe', 'promotion_id' => 1]); // Adjust the condition as per your application
    }

    public function test_admin_registration()
{
    $response = $this->post('/User/register', [
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'usertype' => 'admin',
    ]);

    $response->assertRedirect('/admins'); // Change the redirect URL as per your application logic
    $this->assertDatabaseHas('users', ['email' => 'admin@example.com']);
    $this->assertDatabaseHas('admins', ['name' => 'Admin User']);
}

public function test_pilotedestage_registration()
{
    $response = $this->post('/User/register', [
        'name' => 'Pilote Destage User',
        'email' => 'pilote@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'usertype' => 'pilotedestage',
    ]);

    $response->assertRedirect('/pilotedestage'); // Change the redirect URL as per your application logic
    $this->assertDatabaseHas('users', ['email' => 'pilote@example.com']);
    $this->assertDatabaseHas('pilote_de_promotions', ['name' => 'Pilote Destage User']);
}

public function test_entreprise_registration()
{
    $response = $this->post('/User/register', [
        'name' => 'Entreprise User',
        'email' => 'entreprise@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'usertype' => 'entreprise',
        'secteur' => 'Some Sector',
    ]);

    $response->assertRedirect('/entreprise'); // Change the redirect URL as per your application logic
    $this->assertDatabaseHas('users', ['email' => 'entreprise@example.com']);
    $this->assertDatabaseHas('entreprises', ['name' => 'Entreprise User', 'secteur' => 'Some Sector']);
}

    // Write similar test methods for other scenarios
}
