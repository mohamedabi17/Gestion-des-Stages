<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = [
        'nom_promotion',
        // Add other fillable columns as needed
        'pilote_id',
    ];

    // Define relationships
    public function pilote()
    {
        return $this->belongsTo(PiloteDePromotion::class, 'pilote_id');
    }
}

