<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationController extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'code_postal',
        'numero_de_batiment',
        'ville',
        'pays',
        'entreprise_id',
    ];

    // Define relationships
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
}
