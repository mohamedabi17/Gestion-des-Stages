<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OffreDeStageController extends Controller
{
    public function index()
    {  
        $offers = Offers::all();
        return view('offers.stages', compact('offers'));
    }

      public function fetchStageOffers()
    {
        // Fetch all offers with their associated entreprise
        $offers = Offers::with('entreprise')->get();

        return response()->json(['offers' => $offers]);
    }
    public function fetchStageOffersByEntreprise($id)
    {
        // Fetch all offers with their associated entreprise filtered by entreprise ID
        $offers = Offers::where('entreprise_id', $id)->with('entreprise')->get();

        return response()->json(['offers' => $offers]);
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
            'entreprise_id' => 'required|exists:entreprises,entreprise_id', // Assuming "entreprise" is the table name for Entreprise model
        ]);

        Offers::create($request->all());

        return redirect()->route('offers.index')
                         ->with('success', 'Offre de stage created successfully.');
    }

    public function show($id)
    {
        $offre = Offers::findOrFail($id);
        return view('offers.show', compact('offre'));
    }


  public function edit($id)
{
    $offer = Offers::findOrFail($id); // Retrieve the offer by its ID
    return view('offers.edit', compact('offer'));
}



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'duree' => 'required|max:255',
            'entreprise_id' => 'required|exists:entreprises,entreprise_id', // Assuming "entreprises" is the table name for Entreprise model
        ]);

        $offre = Offers::findOrFail($id); // Assuming your model is named "Offers"

        $offre->update($request->all());

        return redirect()->route('offers.index')
                        ->with('success', 'Offre de stage updated successfully.');
    }


public function destroy(Request $request, $id)
{
    $offre = Offers::findOrFail($id); // Retrieve the offer by its ID

    $offre->delete(); // Delete the offer

    return redirect()->route('offers.index')
                     ->with('success', 'Offre de stage deleted successfully.');
}

}
