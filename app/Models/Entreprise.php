<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $table = 'entreprises';

    protected $primaryKey = 'entreprise_id'; // Specify the custom primary key column

    protected $fillable = [
        'name',
        'secteur',
        'user_id',
    ];

    // Define relationship with User model assuming 'user_id' is the foreign key
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
