<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:etudiants|max:255',
        'competences' => 'sometimes|nullable|max:255', // Make competences nullable
        // Add validation rules for other attributes as needed
    ]);

    Etudiant::create($request->all());

    return redirect()->route('etudiants.index')
                     ->with('success', 'Etudiant created successfully.');
}


    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }


public function update(Request $request, Etudiant $etudiant)
{
    $request->validate([
        'name' => 'required|unique:etudiants,name,' . $etudiant->id . '|max:255',
        'competences' => 'sometimes|nullable|max:255', // Make competences nullable
    ]);

    $etudiant->update($request->all());

    return redirect()->route('etudiants.index')
                     ->with('success', 'Etudiant updated successfully.');
}


    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('etudiants.index')
                         ->with('success', 'Etudiant deleted successfully.');
    }
}
