<?php

namespace App\Http\Controllers;

use App\Models\PossedeStage;
use Illuminate\Http\Request;

class PossedeStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all PossedeStage records from the database
        $possedeStages = PossedeStage::all();
        
        // Return the view with the retrieved data
        return view('possede_stages.index', ['possedeStages' => $possedeStages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new PossedeStage record
        return view('possede_stages.create');
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
            'cv' => 'required',
            'lettre_de_motivation' => 'required',
            // Add validation rules for other attributes as needed
        ]);

        // Create a new PossedeStage record in the database
        $possedeStage = PossedeStage::create($validatedData);

        // Redirect the user to a relevant page
        return redirect()->route('possede_stages.index')->with('success', 'PossedeStage created successfully.');
    }

    // Implement other CRUD methods like show(), edit(), update(), destroy() as needed
}

