<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'date_depart',
        'date_retour',
        'nombre_passagers',
        'destination',
        'preference_vol',
        'preference_hotel',
        'demande_speciale',
    ];
    


}

