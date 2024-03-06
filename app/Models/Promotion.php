<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'nom_promotion', 'etudiant_id', 'pilote_id', 'start_date', 'end_date', 'description'
        // Add other fillable attributes as needed
    ];

    // Getters and setters
    public function getNomPromotionAttribute($value)
    {
        return ucfirst($value); // Capitalize the name of promotion
    }

    public function setNomPromotionAttribute($value)
    {
        $this->attributes['nom_promotion'] = strtolower($value); // Convert the name of promotion to lowercase
    }

    // Implement getters and setters for other attributes as needed

    // Example getter for start_date attribute
    public function getStartDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Example: Format start_date attribute
    }

    // Example setter for start_date attribute
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d'); // Example: Parse and format start_date attribute
    }

    // Example getter for end_date attribute
    public function getEndDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Example: Format end_date attribute
    }

    // Example setter for end_date attribute
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d'); // Example: Parse and format end_date attribute
    }
}
