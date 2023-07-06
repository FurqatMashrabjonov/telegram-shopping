<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsProvider extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'provider',
        'login',
        'password',
        'origin',
        'token',
        'status',
        'default'
    ];


    public function eskizScope($query)
    {
        return $query->where('name', 'eskiz');
    }

    public function playMobileScope($query)
    {
        return $query->where('name', 'playmobile');
    }
}
