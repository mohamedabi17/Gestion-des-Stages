<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
  use Illuminate\Support\Facades\Schema;
use App\Models\Location;
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
            'name' => 'required|unique:entreprises',
            'secteur' => 'required',
        ]);

        Entreprise::create($request->all());

        return redirect()->route('entreprise.index')
                         ->with('success', 'Entreprise created successfully.');
    }

    // Show the form for editing the specified entreprise.
    public function edit(Entreprise $entreprise)
    {
        return view('entreprise.edit', compact('entreprise'));
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

    // Check if the location table exists
    if (Schema::hasTable('locations')) {
        // Update or create location details
        $location = Location::where('entreprise_id', $entreprise->id)->first();
        if ($location) {
            $location->update($request->only(['code-postal', 'numero_de_batiment', 'ville', 'pays']));
        } else {
            Location::create(array_merge($request->only(['code-postal', 'numero_de_batiment', 'ville', 'pays']), ['entreprise_id' => $entreprise->id]));
        }
    } else {
        // Create location table and insert location details
        Schema::create('locations', function ($table) {
            $table->id();
            $table->string('code-postal');
            $table->string('numero_de_batiment');
            $table->string('ville');
            $table->string('pays');
            $table->foreignId('entreprise_id')->constrained('entreprises')->onDelete('cascade');
            $table->timestamps();
        });

        Location::create(array_merge($request->only(['code-postal', 'numero_de_batiment', 'ville', 'pays']), ['entreprise_id' => $entreprise->id]));
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
