<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $primaryKey = 'id'; // Assuming 'entreprise_id' is the primary key

    protected $fillable = [
        'name'
    ];

    // Getters and setters
    public function getNameAttribute($value)
    {
        return ucfirst($value); // Example: capitalize the company name
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value); // Example: convert the company name to lowercase
    }

    public function getSecteurAttribute($value)
    {
        return ucfirst($value); // Example: capitalize the sector
    }

    public function setSecteurAttribute($value)
    {
        $this->attributes['name'] = strtolower($value); // Example: convert the sector to lowercase
    }
}
