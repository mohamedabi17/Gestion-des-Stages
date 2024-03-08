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
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|string',
            'lettre_de_motivation' => 'required|string',
            'etudiant_id' => 'required|exists:etudiants,id',
            'offer_id' => 'required|exists:offers,id',
        ]);

        PostuleStage::create($request->all());

        return redirect()->back()->with('success', 'Postule stage created successfully.');
    }

    // Method to delete a postule stage
    public function destroy(PostuleStage $postuleStage)
    {
        $postuleStage->delete();

        return redirect()->back()->with('success', 'Postule stage deleted successfully.');
    }
}
