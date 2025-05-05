<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offres extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'hotel',
        'price',
        'duration',
        'persons',
        'description',
        'image',
        'rating'
    ];

    // Accessor pour l'URL complète de l'image
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}