<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

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
        'statut' // Ajoutez ce champ
    ];

    protected $attributes = [
        'statut' => 'en attente' // Valeur par défaut
    ];
}