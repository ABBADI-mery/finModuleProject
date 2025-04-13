<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{

    protected $fillable = ['nom', 'prenom', 'email', 'telephone', 'adresse', 'type'];

    public function isClient()
    {
        return $this->type === 'client';
    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }


}
