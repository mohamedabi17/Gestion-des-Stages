<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\PiloteDePromotion;
use App\Models\Promotion;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testUpdatePiloteAndPromotion()
    {
        // Create test data
        $pilote = PiloteDePromotion::factory()->create();
        $promotion = Promotion::factory()->create();

        // Make a PUT request to the update method
        $response = $this->put(route('pilote.update'), [
            'name' => 'New Pilote Name',
            'promotion_id' => $promotion->id,
        ]);

        // Assert the response is successful
        $response->assertStatus(302); // Assuming you're redirecting after successful update

        // Assert the pilote's name is updated
        $this->assertDatabaseHas('pilote_de_promotions', [
            'id' => $pilote->id,
            'name' => 'New Pilote Name',
        ]);

        // Assert the promotion's pilote_id is updated
        $this->assertDatabaseHas('promotions', [
            'id' => $promotion->id,
            'pilote_id' => $pilote->id,
        ]);
    }
}
