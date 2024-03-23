<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'code_postal', 'numero_de_batiment', 'ville', 'pays', 'entreprise_id'
        // Add other fillable attributes as needed
    ];
        public function entreprise()
{
    return $this->belongsTo(Entreprise::class, 'entreprise_id');
}
    // Getters and setters
    public function getCodePostalAttribute($value)
    {
        return strtoupper($value); // Example: convert the code postal to uppercase
    }

    public function setCodePostalAttribute($value)
    {
        $this->attributes['code_postal'] = strtoupper($value); // Example: convert the code postal to uppercase
    }



}

    // Similarly, implement getters and setters for other attributes as needed
