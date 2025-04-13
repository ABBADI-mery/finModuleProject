<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $primaryKey = 'idReservation';
    protected $fillable = [
        'nom',
        'dateReservation',
        'statut',
        'nbPassagers',
        'DemandeSpeciale',
        'PréférencesVol',
        'PréférencesHôtel',
        'paiement_id',
        'assurance_id',
        'client_id'
    ];

    public function paiement()
    {
        return $this->belongsTo(Paiement::class, 'paiement_id');
    }

    public function assurance()
    {
        return $this->belongsTo(Assurance::class, 'assurance_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


}
