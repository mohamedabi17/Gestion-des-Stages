<?php
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostuleStageTest extends TestCase
{
    public function testStorePostuler()
    {
        // Create a mock file for testing
        $fileContent = 'Mock file content';
        Storage::fake('cv_files'); // Use the 'cv_files' disk for fake storage
        $file = UploadedFile::fake()->create('cv.pdf', strlen($fileContent));

        // Create a mock offer ID
        $offerId = 1;

        // Make a POST request to the storepostuler route with mock data
        $response = $this->post(route('postuler.storepostuler', ['id' => $offerId]), [
            'cv' => $file,
            'lettre_de_motivation' => 'This is a test motivation letter',
            'offer_id' => $offerId,
        ]);

        // Assert that the postule stage was created successfully
        $response->assertRedirect()->assertSessionHas('success', 'Postule stage created successfully.');

        // Assert that the postule stage data is stored in the database
        $this->assertDatabaseHas('postule_stages', [
            'lettre_de_motivation' => 'This is a test motivation letter',
            'etudiant_id' => auth()->id(), // Assuming the authenticated user's ID
            'offer_id' => $offerId,
        ]);

        // Assert that the file is stored in the fake storage
        $this->assertTrue(Storage::disk('cv_files')->exists('cv.pdf'));
    }
}
