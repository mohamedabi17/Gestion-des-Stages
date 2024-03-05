<?php

namespace App\Http\Controllers;

use App\Models\OffreDeStage;
use Illuminate\Http\Request;

class OffreDeStageController extends Controller
{
    public function index()
    {
        $offres = OffreDeStage::all();
        return view('offres.index', compact('offres'));
    }

    public function create()
    {
        return view('offres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|max:255',
            'duree' => 'required|max:255',
            'entreprise_id' => 'required|exists:entreprises,id', // Assuming "entreprises" is the table name for Entreprise model
        ]);

        OffreDeStage::create($request->all());

        return redirect()->route('offres.index')
                         ->with('success', 'Offre de stage created successfully.');
    }

    public function show(OffreDeStage $offre)
    {
        return view('offres.show', compact('offre'));
    }

    public function edit(OffreDeStage $offre)
    {
        return view('offres.edit', compact('offre'));
    }

    public function update(Request $request, OffreDeStage $offre)
    {
        $request->validate([
            'type' => 'required|max:255',
            'duree' => 'required|max:255',
            'entreprise_id' => 'required|exists:entreprises,id', // Assuming "entreprises" is the table name for Entreprise model
        ]);

        $offre->update($request->all());

        return redirect()->route('offres.index')
                         ->with('success', 'Offre de stage updated successfully.');
    }

    public function destroy(OffreDeStage $offre)
    {
        $offre->delete();

        return redirect()->route('offres.index')
                         ->with('success', 'Offre de stage deleted successfully.');
    }
}
