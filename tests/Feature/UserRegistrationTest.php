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

    // Write similar test methods for other scenarios
}
