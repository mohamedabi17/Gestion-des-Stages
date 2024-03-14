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
    $postule = PostuleStage::with('offer', 'etudiant.user')->findOrFail($id);

    return view('offers.showCandidates', compact('postule'));
}




public function storepostuler(Request $request, $id)
{
    $request->validate([
        'cv' => 'required|file', // Ensure file is required
        'lettre_de_motivation' => 'required|string',
        'offer_id' => 'required|exists:offers,id',
    ]); 

    // Store the CV file
    $cvPath = $request->file('cv')->store('cv_files');
    $user_id = auth()->id();

    // Retrieve the corresponding etudiant_id using the user_id
    $etudiant_id = Etudiant::where('user_id', $user_id)->value('etudiant_id');

    // Create a new postule stage
    PostuleStage::create([
        'cv' => $cvPath, // Store the file path in the database
        'lettre_de_motivation' => $request->lettre_de_motivation,
        'etudiant_id' => $etudiant_id, // Assuming etudiant_id is the authenticated user's ID
        'offer_id' => $request->offer_id,
    ]);
       return redirect()->route('offers.stages')
                         ->with('success', 'Entreprise created successfully.');
}

    // Method to delete a postule stage
    // public function destroy(PostuleStage $postuleStage)
    // {
    //     $postuleStage->delete();

    //     return redirect()->back()->with('success', 'Postule stage deleted successfully.');
    // }
}
