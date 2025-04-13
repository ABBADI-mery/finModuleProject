<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected static function booted()
    {
        static::addGlobalScope('admin', function ($query) {
            $query->where('type', 'admin');
        });
    }


}
