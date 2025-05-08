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
        'destination',
        'preference_hotel',
        'nombre_passagers',
        'date_depart',
        'date_retour',
        'demande_speciale',
        'statut',
        'user_id',
        'offre_id',
    ];

    protected $attributes = [
        'statut' => 'en attente',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assurances()
    {
        return $this->hasMany(Assurance::class);
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}