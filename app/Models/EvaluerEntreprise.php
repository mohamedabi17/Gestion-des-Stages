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
        'user_id',
    ];

    // Define relationships
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');    }
}
 