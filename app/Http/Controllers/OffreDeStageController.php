<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Offers;
use App\Models\Entreprise;
use App\Models\Etudiant;
use App\Models\EvaluerEntreprise;
use App\Models\EvaluerParPilote;
use App\Models\Location;
use App\Models\PiloteDePromotion;
use App\Models\PostuleStage;
use App\Models\Promotion;
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

    public function create($id)
    {   
        $entreprise = Entreprise::find($id);
        // Ensure authentication
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login page if user is not authenticated
        }
          return view('offers.create', compact('entreprise'));
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
        $offre = Offers::find($id);
        return view('offers.showCandidates', compact('offre'));
    }

// public function search(Request $request)
// {
//     $query = $request->input('query');

//     // Retrieve entreprise IDs matching the query
//     $entrepriseIds = Entreprise::where('name', 'like', "%$query%")->pluck('entreprise_id');

//     // Retrieve location IDs matching the query
//     $locationIds = Location::where('ville', 'like', "%$query%")
//         ->orWhere('pays', 'like', "%$query%")
//         ->pluck('entreprise_id');

//     // Retrieve offers meeting the criteria
//     $offers = Offers::where(function ($queryBuilder) use ($entrepriseIds, $locationIds) {
//             $queryBuilder->whereIn('entreprise_id', $entrepriseIds)
//                 ->orWhereIn('entreprise_id', $locationIds);
//         })
//         ->where(function ($offerQuery) use ($query) {
//             $offerQuery->where('name', 'like', "%$query%")
//                 ->orWhere('type', 'like', "%$query%");
//         })
//         ->get();

//     // Return the results to the view
//     return view('etudiant.search', compact('offers'));
// }
public function statistics()
{
    // Retrieve statistics logic here
    $totalOffers = Offers::count();
    $totalCandidates = PostuleStage::count();
    $totalEntreprises = Entreprise::count();
    $totalEtudiants = Etudiant::count();
    $totalPilotes = PiloteDePromotion::count(); // Assuming there's a model named Pilote
    $totalEvaluationsPilote = EvaluerParPilote::count();
    $totalEvaluationsEntreprise = EvaluerEntreprise::count();
    $totalAdmins = Admins::count(); // Assuming there's a model named Admin
    $totalPromotions = Promotion::count();

    // Return the statistics to a view
    return view('offers.statistics', [
        'totalOffers' => $totalOffers,
        'totalCandidates' => $totalCandidates,
        'totalEntreprises' => $totalEntreprises,
        'totalEtudiants' => $totalEtudiants,
        'totalPilotes' => $totalPilotes,
        'totalEvaluationsPilote' => $totalEvaluationsPilote,
        'totalEvaluationsEntreprise' => $totalEvaluationsEntreprise,
        'totalAdmins' => $totalAdmins,
        'totalPromotions' => $totalPromotions,
    ]);
}




public function search(Request $request)
{
    // Retrieve search parameters from the request
    $query = $request->input('query');
    $name = $request->input('name');
    $location = $request->input('location');
    $competence = $request->input('competence');

    // Retrieve entreprise IDs matching the name query
    $entrepriseIds = Entreprise::where('name', 'like', "%$name%")->pluck('entreprise_id');

    // Retrieve location IDs matching the location query
    $locationIds = Location::where('ville', 'like', "%$location%")
        ->orWhere('pays', 'like', "%$location%")
        ->pluck('entreprise_id');

    // Retrieve offers meeting the criteria
    $offers = Offers::where(function ($queryBuilder) use ($entrepriseIds, $locationIds, $query, $competence) {
            $queryBuilder->whereIn('entreprise_id', $entrepriseIds)
                ->orWhereIn('entreprise_id', $locationIds)
                ->orWhere('name', 'like', "%$query%")
                ->orWhere('type', 'like', "%$competence%");
        })
        ->get();

    // Return the results to the view
    return view('etudiant.search', compact('offers'));
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
