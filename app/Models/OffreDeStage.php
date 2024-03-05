<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffreDeStage extends Model
{
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key

    protected $fillable = [
        'type', 'duree', 'entreprise_id'
    ];

    // Getters and setters
    public function getTypeAttribute($value)
    {
        return ucfirst($value); // Example: capitalize the type
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtolower($value); // Example: convert the type to lowercase
    }

    // Similarly, implement getters and setters for other attributes as needed
}
