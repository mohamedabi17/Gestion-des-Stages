<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluerEntreprise extends Model
{
    protected $table = 'evaluer_entreprise';

    protected $fillable = [
        'nom',
        'commentaire',
        'entreprise_id',
        'etudiant_id',
    ];

    // Define relationships
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }
}
 