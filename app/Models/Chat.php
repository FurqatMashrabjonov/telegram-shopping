<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends TelegraphChat
{

    protected $table = 'telegraph_chats';


    protected $fillable = [
        'chat_id',
        'name',
        'lang',
        'phone'
    ];

    protected $casts = [
        'from' => 'array',
    ];

}
