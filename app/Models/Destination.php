<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{

    protected $fillable = ['nom', 'photo', 'description'];

    public function activites()
    {
        return $this->hasMany(Activite::class);
    }


}
