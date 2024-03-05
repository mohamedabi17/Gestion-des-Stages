<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluerParPilote extends Model
{
    protected $fillable = [
        'note', 'commentaire'
        // Add other fillable attributes as needed
    ];

    // Getters and setters
    public function getNoteAttribute($value)
    {
        return intval($value); // Example: convert the note to an integer
    }

    public function setNoteAttribute($value)
    {
        $this->attributes['note'] = (string) $value; // Example: ensure note is stored as a string
    }

    // Similarly, implement getters and setters for other attributes as needed
}
