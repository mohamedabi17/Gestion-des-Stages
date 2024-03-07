<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = 'offers';

    protected $fillable = [
        'name',
        'type',
        'duree',
        'entreprise_id',
    ];

    // Define relationship with Entreprise model assuming 'entreprise_id' is the foreign key
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
}
