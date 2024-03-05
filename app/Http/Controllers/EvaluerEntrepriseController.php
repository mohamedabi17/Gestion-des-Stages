<?php

namespace App\Http\Controllers;

use App\Models\EvaluerEntreprise;
use Illuminate\Http\Request;
class EvaluerEntrepriseController extends Controller
{
    public function index()
    {
        $evaluations = EvaluerEntreprise::all();
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        return view('evaluations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:evaluer_entreprise|max:255',
            'commentaire' => 'required',
            // Add validation rules for other attributes as needed
        ]);

        EvaluerEntreprise::create($request->all());

        return redirect()->route('evaluations.index')
                         ->with('success', 'Evaluation created successfully.');
    }

    public function show(EvaluerEntreprise $evaluation)
    {
        return view('evaluations.show', compact('evaluation'));
    }

    public function edit(EvaluerEntreprise $evaluation)
    {
        return view('evaluations.edit', compact('evaluation'));
    }

    public function update(Request $request, EvaluerEntreprise $evaluation)
    {
        $request->validate([
            'nom' => 'required|unique:evaluer_entreprise,nom,' . $evaluation->id . '|max:255',
            'commentaire' => 'required',
            // Add validation rules for other attributes as needed
        ]);

        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')
                         ->with('success', 'Evaluation updated successfully.');
    }

    public function destroy(EvaluerEntreprise $evaluation)
    {
        $evaluation->delete();

        return redirect()->route('evaluations.index')
                         ->with('success', 'Evaluation deleted successfully.');
    }
}
