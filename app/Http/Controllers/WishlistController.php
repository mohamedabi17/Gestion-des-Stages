<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

public function index()
{
    // Retrieve wishlist items for the authenticated user
    $wishlistItems = Wishlist::where('etudiant_id', auth()->id())->with('offer')->get();
    
    // Extract offer information from wishlist items
    $offers = $wishlistItems->map(function ($wishlistItem) {
        return $wishlistItem->offer;
    });

    // Pass the offers to the view
    return view('wishlist.index', compact('offers'));
}


  public function add(Request $request, $offer_id)
{
    $etudiant_id = auth()->id();

    // Check if a wishlist item with the same etudiant_id and offer_id already exists
    $existingWishlistItem = Wishlist::where('etudiant_id', $etudiant_id)
                                    ->where('offer_id', $offer_id)
                                    ->exists();

    if (!$existingWishlistItem) {
        // If no such record exists, create a new wishlist item
        Wishlist::create([
            'etudiant_id' => $etudiant_id,
            'offer_id' => $offer_id
        ]);
        return redirect()->route('wishlist.index')->with('success', 'Offer added to wishlist successfully');
    } else {
        // If a record already exists, you may choose to redirect back with an error message
        return redirect()->route('wishlist.index')->with('error', 'Offer is already in your wishlist');
    }
}

    public function remove(Request $request, $offer_id)
    {
        Wishlist::where('etudiant_id', auth()->id())->where('offer_id', $offer_id)->delete();
        return redirect()->route('wishlist.index')->with('success', 'Offer removed from wishlist successfully');
    }
}
