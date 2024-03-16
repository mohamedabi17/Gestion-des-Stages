<?php

namespace App\Http\Controllers;

use App\Models\EvaluerParPilote;
use App\Models\EvaluerEntreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EvaluerParPiloteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required', // Add validation rules for 'note' attribute
            'commentaire' => 'required',
            'entreprise_id' => 'required',
            'pilote_id' => 'required', // Change 'etudiant_id' to 'pilote_id'
            // Add validation rules for other attributes as needed
        ]);

        // Check if the user type is 'pilotedestage'
        $user = User::findOrFail(Auth::id());
        if ($user->usertype === 'pilotedestage') {
            EvaluerParPilote::create($request->all());
        } else {
            EvaluerEntreprise::create($request->all());
        }

        return redirect()->route('evaluations.index')
                         ->with('success', 'Evaluation created successfully.');
    }
}
