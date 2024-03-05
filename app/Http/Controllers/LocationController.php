<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code_postal' => 'required|max:255',
            'numero_de_batiment' => 'required|max:255',
            'ville' => 'required|max:255',
            'pays' => 'required|max:255',
            'entreprise_id' => 'required|exists:entreprises,id', // Assuming "entreprises" is the table name for Entreprise model
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')
                         ->with('success', 'Location created successfully.');
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'code_postal' => 'required|max:255',
            'numero_de_batiment' => 'required|max:255',
            'ville' => 'required|max:255',
            'pays' => 'required|max:255',
            'entreprise_id' => 'required|exists:entreprises,id', // Assuming "entreprises" is the table name for Entreprise model
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')
                         ->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')
                         ->with('success', 'Location deleted successfully.');
    }
}
