<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
 
    protected $primaryKey = 'id_paiement';

    protected $fillable = [
        'montant',
        'date_paiement',
        'methode',
    ];

    // Relations (si besoin)
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'paiement_id');
    }
}

