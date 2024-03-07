<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PiloteDePromotion extends Model
{
    protected $primaryKey = 'pilote_id'; // Assuming 'pilote_id' is the primary key

    protected $fillable = [
        'name'
        // Add other fillable attributes as needed
    ];

    protected $table = 'pilote_de_promotions';

    // Define relationship
    public function evaluations()
    {
        return $this->hasMany(EvaluerParPilote::class, 'pilote_id');
    }

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
