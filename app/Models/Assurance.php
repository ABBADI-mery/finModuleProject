<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{

    protected $primaryKey = 'idAssurance';
    protected $fillable = ['type', 'Duree'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


}
