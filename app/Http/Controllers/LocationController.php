<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location; // Import the Location model

class LocationController extends Controller
{
    public function index()
    {
        // Retrieve all locations
        $locations = Location::all();
        
        // Return a view with the locations data
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        // Return a view for creating a new location
        return view('locations.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'code-postal' => 'nullable|string', // Adjust validation rules as needed
            'numero_de_batiment' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'entreprise_id' => 'required|exists:entreprises,entreprise_id' // Ensure entreprise_id exists in the entreprises table
        ]);

        // Create a new location instance and save it to the database
        Location::create($request->all());

        // Redirect the user back or to a different location
        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    public function show(Location $location)
    {
        // Return a view showing the details of a specific location
        return view('locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        // Return a view for editing a specific location
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        // Validate the incoming request data
        $request->validate([
            'code-postal' => 'nullable|string', // Adjust validation rules as needed
            'numero_de_batiment' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'entreprise_id' => 'required|exists:entreprises,entreprise_id' // Ensure entreprise_id exists in the entreprises table
        ]);

        // Update the location instance with the new data
        $location->update($request->all());

        // Redirect the user back or to a different location
        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        // Delete the specified location from the database
        $location->delete();

        // Redirect the user back or to a different location
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
