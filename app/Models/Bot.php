<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bot extends TelegraphBot
{

    protected $table = 'telegraph_bots';

    protected $fillable = [
        'token',
        'name',
        'user_id'
    ];



}
