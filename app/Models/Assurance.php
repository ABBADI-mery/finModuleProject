<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'type_assurance',
        'destination',
        'duree',
        
        
        
    ];

    public $timestamps = true;

    protected $dates = [
        'created_at',
        'updated_at',
       
    ];

    // Relation avec la réservation
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}