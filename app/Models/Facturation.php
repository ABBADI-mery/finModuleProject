<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{

    protected $table = 'facturations'; // facultatif si le nom du modèle est Facturation

    protected $fillable = [
        'montant',
        'statut',
    ];


}
