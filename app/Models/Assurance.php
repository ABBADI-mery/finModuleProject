<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance', 
        'duree',
        'destination',
        'type_assurance'
    ];

    // Active explicitement les timestamps
    public $timestamps = true;

    // Définit les champs de type date
    protected $dates = [
        'created_at',
        'updated_at',
        'date_naissance' // Pour une bonne gestion des dates
    ];
}