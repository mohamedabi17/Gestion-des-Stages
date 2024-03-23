<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
  use Illuminate\Support\Facades\Schema;
use App\Models\Location;

use Illuminate\Support\Facades\Auth;
class EntrepriseController extends Controller
{
    // Display a listing of the entreprises.
public function index()
{
    $entreprises = Entreprise::all();
    return view('entreprise.index', compact('entreprises'));
}

public function show($id)
{
    $entreprise = Entreprise::find($id);
    return view('entreprise.dashboard', compact('entreprise'));
}

    

    // Show the form for creating a new entreprise.
    public function create()
    {
        return view('entreprise.create');
    }
    

     public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search based on the query
        $entreprises = Entreprise::where('name', 'like', "%$query%")->get();

        // Return the results to the view
        return view('entreprise.search', compact('entreprises'));
    }
    // Store a newly created entreprise in the database.
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'secteur' => 'required',
        'code_postal' => 'required', // Make it nullable
        'numero_de_batiment' => 'required',
        'ville' => 'required',
        'pays' => 'required',
    ]);

    $entreprise = Entreprise::create([
        'name' => $request->name,
        'secteur' => $request->secteur,
    ]);

    // Create location
  // Create location
    Location::create([
    'entreprise_id' => $entreprise->entreprise_id, // Assuming that the primary key of Entreprise model is 'id'
    'code_postal' => $request->code_postal, // Use underscores instead of dashes
    'numero_de_batiment' => $request->numero_de_batiment,
    'ville' => $request->ville,
    'pays' => $request->pays,
]);



    return redirect()->route('pilotePromotion.dashboard')
                     ->with('success', 'Entreprise created successfully.');
}
public function preview($id)
{
    // Cast $id to an integer to prevent SQL injection
    $id = (int)$id;

    $entreprise = Entreprise::findOrFail($id);

    return view('entreprise.preview', compact('entreprise'));
}


    // Update the specified entreprise in the database.

public function update(Request $request, $entreprise_id)
{
    // Fetch the Entreprise object based on the entreprise_id
    $entreprise = Entreprise::findOrFail($entreprise_id);

 $request->validate([
    'name' => 'required|unique:entreprises,name',
    'secteur' => 'required',
    'code-postal' => 'nullable', // Make it nullable
    'numero_de_batiment' => 'required',
    'ville' => 'required',
    'pays' => 'required',
]);

    // Update entreprise details
    $entreprise->update($request->only(['name', 'secteur']));
        // Update or create location details
        $location = Location::where('entreprise_id', $entreprise->entreprise_id)->first();
        if ($location) {
            $location->update($request->only(['code-postal', 'numero_de_batiment', 'ville', 'pays']));
        } else {
            Location::create(array_merge($request->only(['code-postal', 'numero_de_batiment', 'ville', 'pays']), ['entreprise_id' => $entreprise->entreprise_id]));
        }
 

    return redirect()->route('entreprise.dashboard')
                     ->with('success', 'Entreprise and Location updated successfully');
}



    // Remove the specified entreprise from the database.
    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();

        return redirect()->route('entreprise.index')
                         ->with('success', 'Entreprise deleted successfully');
    }
}
