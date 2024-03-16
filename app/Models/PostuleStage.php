<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostuleStage extends Model
{
    protected $table = 'postule_stage';

    protected $fillable = ['cv', 'lettre_de_motivation', 'etudiant_id', 'offer_id'];
    // protected $casts = ['cv' => 'binary'];

    // Define relationships
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    public function offer()
    {
        return $this->belongsTo(Offers::class, 'offer_id');
    }
}

