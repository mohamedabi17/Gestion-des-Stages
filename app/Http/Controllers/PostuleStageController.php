<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\PostuleStage;
use App\Models\User;
use Illuminate\Http\Request;

class PostuleStageController extends Controller
{   


     public function index()
    {
        $candidates = PostuleStage::all();
        return view('entreprise.candidates', compact('candidates'));
    }

    /**
     * Show the form for creating a new admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }
    // Method to store a new postule stage
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'cv' => 'required|string',
    //         'lettre_de_motivation' => 'required|string',
    //         'etudiant_id' => 'required|exists:etudiants,id',
    //         'offer_id' => 'required|exists:offers,id',
    //     ]);

    //     PostuleStage::create($request->all());

    //     return redirect()->back()->with('success', 'Postule stage created successfully.');
    // }

    // Method to delete a postule stage
    public function destroy(PostuleStage $postuleStage)
    {
        $postuleStage->delete();

        return redirect()->back()->with('success', 'Postule stage deleted successfully.');
    }


public function indexpostuler($id)
{
    // Retrieve the offer ID from the route parameter
    $offerId = $id;

    // Fetch candidates for the specific offer ID
    $candidates = PostuleStage::where('offer_id', $offerId)->get();

    return view('postuler.postuler', compact('candidates', 'offerId'));
}

public function show($id)
{
    // Retrieve the PostuleStage by its ID along with the associated offer, etudiant, and user
    $postule = PostuleStage::where('offer_id', $id)->with('offer', 'user')->first();

    if (!$postule) {
        // Handle the case where the PostuleStage doesn't exist
        $errorMessage = "The PostuleStage with ID $id was not found.";
        return view('offers.showCandidates', compact('errorMessage'));
    }

    return view('offers.showCandidates', compact('postule'));
}


public function storepostuler(Request $request, $id)
{
    $request->validate([
        'cv' => 'required|file',
        'lettre_de_motivation' => 'required|string',
        'offer_id' => 'required|exists:offers,id',
    ]);

    // Store the CV file in the public directory under cv_files folder
    $cvPath = $request->file('cv')->store('cv_files', 'public');



    // Store file metadata in the database
    $postule = new PostuleStage();
    $postule->cv = $cvPath;
    $postule->lettre_de_motivation = $request->lettre_de_motivation;
    $postule->user_id = auth()->id();
    $postule->offer_id = $request->offer_id;
    $postule->save();

    return redirect()->route('offers.stages')->with('success', 'Postule created successfully.');
}




public function downloadCV($id)
{
    // Retrieve the PostuleStage record by its ID
    $postule = PostuleStage::findOrFail($id);
    
    // Define the file name
    $fileName = 'cv_' . $postule->id . '.pdf'; // You can adjust the file extension as needed

    // Define the file path
    $filePath = storage_path('app/cv_files/' . $fileName);

    // Save the binary data to a file
    file_put_contents($filePath, $postule->cv);

    // Provide a download link for the file
    return response()->download($filePath, $fileName);
}

    // Method to delete a postule stage
    // public function destroy(PostuleStage $postuleStage)
    // {
    //     $postuleStage->delete();

    //     return redirect()->back()->with('success', 'Postule stage deleted successfully.');
    // }
}
