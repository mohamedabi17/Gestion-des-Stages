<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all Promotion records from the database
        $promotions = Promotion::all();
        
        // Return the view with the retrieved data
        return view('promotions.index', ['promotions' => $promotions]);
    }
    public function getPromotions()
    {
        // Retrieve all Promotion records from the database
        $promotions = Promotion::all();
        
        // Return the view with the retrieved data
        return( ['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new Promotion record
        return view('promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nom_promotion' => 'required',
            'etudiant_id' => 'required',
            'pilote_id' => 'required',
            // Add validation rules for other attributes as needed
        ]);

        // Create a new Promotion record in the database
        $promotion = Promotion::create($validatedData);

        // Redirect the user to a relevant page
        return redirect()->route('promotions.index')->with('success', 'Promotion created successfully.');
    }

    // Implement other CRUD methods like show(), edit(), update(), destroy() as needed
}

