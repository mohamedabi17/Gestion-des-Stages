<?php

namespace App\Http\Controllers;

use App\Models\PiloteDePromotion;
use App\Models\Promotion;
use Illuminate\Http\Request;
class PiloteDePromotionController extends Controller
{
    public function index()
    {
        $pilotes = PiloteDePromotion::all();
        return view('pilotes.index', compact('pilotes'));
    }

    public function create()
    {
        return view('pilotes.create');
    }
     

        // public function fetchPilote()
        // {
        //     $pilote = PiloteDePromotion::where('user_id', auth()->id())->first();
            
        //     if (!$pilote) {
        //         return response()->json(['error' => 'Pilote not found'], 404);
        //     }

        //     return response()->json(['pilote' => $pilote]);
        // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            // Add validation for other attributes if needed
        ]);
         
        PiloteDePromotion::create($request->all());

        return redirect()->route('pilotes.index')
                         ->with('success', 'Pilote de promotion created successfully.');
    }

    public function show(PiloteDePromotion $pilote)
    {
        return view('pilotes.show', compact('pilote'));
    }
   


     public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search based on the query
        $pilotes = PiloteDePromotion::where('name', 'like', "%$query%")->get();

        // Return the results to the view
        return view('pilotePromotion.search', compact('pilotes'));
    }
    public function edit(PiloteDePromotion $pilote)
    {
        return view('pilotes.edit', compact('pilote'));
    }
    
   public function update(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'promotion_id' => 'required', // Ensure promotion_id exists in promotions table
    ]);

    // Find the pilote by its user ID
    $pilote = PiloteDePromotion::where('user_id', auth()->id())->firstOrFail();

    // Update the pilote's name
    $pilote->update([
        'name' => $request->name,
    ]);

    // Find the promotion by its ID
    $promotion = Promotion::findOrFail($request->promotion_id);

    // Update the pilote_id in the promotion
    $promotion->update([
        'pilote_id' => $pilote->pilote_id, // Use the pilote's ID directly
    ]);

    return redirect()->route('pilotePromotion.dashboard')
                    ->with('success', 'Pilote de promotion updated successfully.');
}

    public function destroy(PiloteDePromotion $pilote)
    {
        $pilote->delete();

        return redirect()->route('pilotes.index')
                         ->with('success', 'Pilote de promotion deleted successfully.');
    }

    
}


