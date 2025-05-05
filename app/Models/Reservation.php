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
        'statut',
        'user_id',
    ];

    protected $attributes = [
        'statut' => 'en attente',
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec les assurances
    public function assurances()
    {
        return $this->hasMany(Assurance::class);
    }
}