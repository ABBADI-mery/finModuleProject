<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'birth_date',
        'gender',
        'address',
        'profile_picture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}