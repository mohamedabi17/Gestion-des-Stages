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
    ];
}
