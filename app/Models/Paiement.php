<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'montant',
        'methode',
        'details',
    ];

    protected $casts = [
        'details' => 'array',
    ];
}
