<?php

namespace App\Http\Controllers;

use App\Models\EvaluerEntreprise;
use App\Models\EvaluerParPilote;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;

class EvaluerEntrepriseController extends Controller
{
    public function index()
    {
        $evaluations = EvaluerEntreprise::all();
        return view('evaluations.index', compact('evaluations'));
    }


    // public function create($id)
    // {
    //     // Find the etudiant by ID
    //     $candidataes = EvaluerEntreprise::findOrFail($id);

    //     // Pass the etudiant_id to the view
    //     return view('evaluations.create', compact('candidataes'));
    // }
    public function create()
    {
        return view('evaluations.create');
    }



public function store(Request $request)
{
    $request->validate([
        'nom' => 'required||max:255',
        'commentaire' => 'required',
        'entreprise_id' => 'required',
        'etudiant_id' => 'required',
        // Add validation rules for other attributes as needed
    ]);

    $user = User::findOrFail(auth()->id());

    if ($user->usertype === 'pilotedestage') {
        $evaluerparpilote = EvaluerParPilote::create([
            'note' => $request->nom,
            'commentaire' => $request->commentaire,
            'entreprise_id' => $request->entreprise_id,
            'pilote_id' => $request->etudiant_id,
        ]);
    } else if ($user->usertype === 'etudiant' ) {
        $evaluer = EvaluerEntreprise::create([
            'nom' => $request->nom,
            'commentaire' => $request->commentaire,
            'entreprise_id' => $request->entreprise_id,
            'user_id' =>$request->etudiant_id,
        ]);
    }
    else if  ($user->usertype === 'admin') {
        $evaluer = EvaluerEntreprise::create([
            'nom' => $request->nom,
            'commentaire' => $request->commentaire,
            'entreprise_id' => $request->entreprise_id,
            'user_id' =>$request->etudiant_id,
        ]);
    }

    return redirect()->route('evaluations.index')
                     ->with('success', 'Evaluation created successfully.');
}



public function show($id)
{   
    // Find the entreprise by its ID
    $entreprise = Entreprise::findOrFail($id);

    // Find all evaluations associated with the entreprise
    $evaluations1 = EvaluerEntreprise::where('entreprise_id', $id)->get();
    $evaluations2 = EvaluerParPilote::where('entreprise_id', $id)->get();

    // Merge the two collections of evaluations into a single collection
    $evaluations = $evaluations1->merge($evaluations2);

    // Pass the evaluations and entreprise to the view
    return view('evaluations.show', compact('evaluations', 'entreprise'));
}



    public function edit($id)
    {
        $evaluation = EvaluerEntreprise::findOrFail($id);
        return view('evaluations.edit', compact('evaluation'));
    }

    public function update(Request $request, $id)
    {
        $evaluation = EvaluerEntreprise::findOrFail($id);

        $request->validate([
            'nom' => 'required|unique:evaluer_entreprise,nom,' . $evaluation->id . '|max:255',
            'commentaire' => 'required',
            'entreprise_id' => 'required', // Add validation for entreprise_id
            'etudiant_id' => 'required', // Add validation for etudiant_id
            // Add validation rules for other attributes as needed
        ]);

        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')
                         ->with('success', 'Evaluation updated successfully.');
    }

    public function destroy($id)
    {
        $evaluation = EvaluerEntreprise::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index')
                         ->with('success', 'Evaluation deleted successfully.');
    }
}
