<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'email',
        'destination',
        'date_depart',
        'duree',
        'budget',
        'nombre_personnes',
        'type_voyage',
        'preferences',
        'plan_content',
    ];

    /**
     * Relation avec l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}