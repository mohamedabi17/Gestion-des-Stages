<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OffreDeStageController extends Controller
{
    public function index()
    {  
        $offers = Offers::all();
        return view('offers.dashboard', compact('offers'));
    }

    public function create()
    {   

        // Ensure authentication
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login page if user is not authenticated
        }
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'duree' => 'required|max:255',
            'entreprise_id' => 'required|exists:entreprise,id', // Assuming "entreprise" is the table name for Entreprise model
        ]);

        Offers::create($request->all());

        return redirect()->route('offers.index')
                         ->with('success', 'Offre de stage created successfully.');
    }

    public function show(Offers $offre)
    {
        return view('offers.show', compact('offre'));
    }

    public function edit(Offers $offre)
    {
        return view('offers.edit', compact('offre'));
    }

    public function update(Request $request, Offers $offre)
    {
        $request->validate([
             'name' => 'required|max:255',
            'type' => 'required|max:255',
            'duree' => 'required|max:255',
            'entreprise_id' => 'required|exists:entreprise,id', // Assuming "entreprise" is the table name for Entreprise model
        ]);

        $offre->update($request->all());

        return redirect()->route('offers.index')
                         ->with('success', 'Offre de stage updated successfully.');
    }

    public function destroy(Offers $offre)
    {
        $offre->delete();

        return redirect()->route('offers.index')
                         ->with('success', 'Offre de stage deleted successfully.');
    }
}
