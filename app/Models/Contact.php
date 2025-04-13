<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $primaryKey = 'id_contact';
    protected $fillable = ['email', 'nom', 'sujet', 'message'];


}
