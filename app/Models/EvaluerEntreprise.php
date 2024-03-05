<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluerEntreprise extends Model
{
    protected $fillable = [
        'nom', 'commentaire'
        // Add other fillable attributes as needed
    ];

    // Getters and setters
    public function getNomAttribute($value)
    {
        return ucfirst($value); // Example: capitalize the name
    }

    public function setNomAttribute($value)
    {
        $this->attributes['nom'] = strtolower($value); // Example: convert the name to lowercase
    }

    // Similarly, implement getters and setters for other attributes as needed
}
