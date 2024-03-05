<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $primaryKey = 'etudiant_id'; // Assuming 'etudiant_id' is the primary key

    protected $fillable = [
        'name'
        // Add other fillable attributes as needed
    ];

    // Getters and setters
    public function getNameAttribute($value)
    {
        return ucfirst($value); // Example: capitalize the name
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value); // Example: convert the name to lowercase
    }

    // Similarly, implement getters and setters for other attributes as needed
}
