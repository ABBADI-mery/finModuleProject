<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{

    protected $primaryKey = 'idAvis';
    protected $fillable = ['contenu', 'datePublication', 'note', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


}
