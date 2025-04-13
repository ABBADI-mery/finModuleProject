<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected static function booted()
    {
        static::addGlobalScope('client', function ($query) {
            $query->where('type', 'client');
        });
    }


}
