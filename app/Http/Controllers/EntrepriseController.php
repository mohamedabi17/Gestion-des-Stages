<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    // Display a listing of the entreprises.
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprises.index', compact('entreprises'));
    }

    // Show the form for creating a new entreprise.
    public function create()
    {
        return view('enterprises.create');
    }

    public function store(Request $request)
    {
        // Validation logic
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        // Create a new enterprise record
        Entreprise::create($validatedData);

        // Redirect the user after successful creation
        return redirect()->route('enterprises.index')->with('success', 'Enterprise created successfully!');
    }

    // Store a newly created entreprise in the database.
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:entreprises',
            'secteur' => 'required',
        ]);

        Entreprise::create($request->all());

        return redirect()->route('entreprises.index')
                         ->with('success', 'Entreprise created successfully.');
    }

    // Show the form for editing the specified entreprise.
    public function edit(Entreprise $entreprise)
    {
        return view('entreprises.edit', compact('entreprise'));
    }

    // Update the specified entreprise in the database.
    public function update(Request $request, Entreprise $entreprise)
    {
        $request->validate([
            'name' => 'required|unique:entreprises,name,'.$entreprise->id,
            'secteur' => 'required',
        ]);

        $entreprise->update($request->all());

        return redirect()->route('entreprises.index')
                         ->with('success', 'Entreprise updated successfully');
    }

    // Remove the specified entreprise from the database.
    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();

        return redirect()->route('entreprises.index')
                         ->with('success', 'Entreprise deleted successfully');
    }
}
