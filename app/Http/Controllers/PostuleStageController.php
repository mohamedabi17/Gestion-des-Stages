<?php

namespace App\Http\Controllers;

use App\Models\PostuleStage;
use Illuminate\Http\Request;

class PostuleStageController extends Controller
{   


     public function index()
    {
        $candidates = PostuleStage::all();
        return view('candidates.index', compact('admins'));
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



public function storepostuler(Request $request, $id)
{
    $request->validate([
        'cv' => 'required|file', // Ensure file is required
        'lettre_de_motivation' => 'required|string',
        'offer_id' => 'required|exists:offers,id',
    ]);

    // Retrieve file content
    $fileContent = file_get_contents($request->file('cv'));

    // Create a new postule stage
    PostuleStage::create([
        'cv' => $fileContent,
        'lettre_de_motivation' => $request->lettre_de_motivation,
        'etudiant_id' => auth()->user()->id, // Assuming etudiant_id is the authenticated user's ID
        'offer_id' => $request->offer_id,
    ]);

    return redirect()->back()->with('success', 'Postule stage created successfully.');
}


    // Method to delete a postule stage
    // public function destroy(PostuleStage $postuleStage)
    // {
    //     $postuleStage->delete();

    //     return redirect()->back()->with('success', 'Postule stage deleted successfully.');
    // }
}
