<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table = 'etudiants';

    protected $primaryKey = 'etudiant_id'; // Specify the custom primary key column

    protected $fillable = [
        'name',
        'competances',
        'user_id',
        'promotion_id',
    ];

    // Define relationship with User model assuming 'user_id' is the foreign key
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define relationship with Promotion model assuming 'promotion_id' is the foreign key
}
