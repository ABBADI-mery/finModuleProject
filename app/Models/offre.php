<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'duration',
        'people',
        'price',
        'hotel_name',
        'description',
        'image_path'
    ];
}