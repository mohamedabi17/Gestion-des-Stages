<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'nom_promotion', 'etudiant_id', 'pilote_id'
        // Add other fillable attributes as needed
    ];

    // Getters and setters
    public function getNomPromotionAttribute($value)
    {
        return ucfirst($value); // Example: capitalize the name of promotion
    }

    public function setNomPromotionAttribute($value)
    {
        $this->attributes['nom_promotion'] = strtolower($value); // Example: convert the name of promotion to lowercase
    }

    // Similarly, implement getters and setters for other attributes as needed
}
