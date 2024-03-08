<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
