<?php

namespace App\Http\Controllers;

use App\Models\PiloteDePromotion;
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

    public function edit(PiloteDePromotion $pilote)
    {
        return view('pilotes.edit', compact('pilote'));
    }

    public function update(Request $request, PiloteDePromotion $pilote)
    {
        $request->validate([
            'name' => 'required|max:255',
            // Add validation for other attributes if needed
        ]);

        $pilote->update($request->all());

        return redirect()->route('pilotes.index')
                         ->with('success', 'Pilote de promotion updated successfully.');
    }

    public function destroy(PiloteDePromotion $pilote)
    {
        $pilote->delete();

        return redirect()->route('pilotes.index')
                         ->with('success', 'Pilote de promotion deleted successfully.');
    }

    
}


