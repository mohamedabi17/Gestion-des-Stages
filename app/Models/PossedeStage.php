<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PossedeStage extends Model
{
    protected $fillable = [
        'cv', 'lettre_de_motivation'
        // Add other fillable attributes as needed
    ];

    // Getters and setters
    public function getCvAttribute($value)
    {
        // Example: you can manipulate the CV file path here if needed
        return $value;
    }

    public function setCvAttribute($value)
    {
        // Example: you can store the CV file path in a specific format here if needed
        $this->attributes['cv'] = $value;
    }

    public function getLettreDeMotivationAttribute($value)
    {
        // Example: you can manipulate the letter of motivation file path here if needed
        return $value;
    }

    public function setLettreDeMotivationAttribute($value)
    {
        // Example: you can store the letter of motivation file path in a specific format here if needed
        $this->attributes['lettre_de_motivation'] = $value;
    }

    // Similarly, implement getters and setters for other attributes as needed
}
