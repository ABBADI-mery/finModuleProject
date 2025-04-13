<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
  
        protected $primaryKey = 'idActivite';
        protected $fillable = ['nom', 'description', 'lieu', 'destination_id'];
    
        public function destination()
        {
            return $this->belongsTo(Destination::class);
        }
    
    
}
