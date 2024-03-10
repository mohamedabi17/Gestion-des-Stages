<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['note', 'etudiant_id', 'offer_id'];

    // Define relationships
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offers::class);
    }
}
