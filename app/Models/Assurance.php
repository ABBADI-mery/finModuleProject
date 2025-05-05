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
        'type_assurance',
        'reservation_id',
    ];

    public $timestamps = true;

    protected $dates = [
        'created_at',
        'updated_at',
        'date_naissance',
    ];

    // Relation avec la réservation
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}