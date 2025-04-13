<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Définir la clé primaire personnalisée
    protected $primaryKey = 'id_contact';

    // Définir les champs pouvant être massivement assignés
    protected $fillable = ['email', 'nom', 'sujet', 'message'];
}
