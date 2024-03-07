<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluerParPilote extends Model
{
    protected $table = 'evaluer_par_pilote';

    protected $fillable = [
        'note',
        'commentaire',
        'entreprise_id',
        'pilote_id',
    ];

    // Define relationships
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }

    public function piloteDePromotion()
    {
        return $this->belongsTo(PiloteDePromotion::class, 'pilote_id');
    }
}
