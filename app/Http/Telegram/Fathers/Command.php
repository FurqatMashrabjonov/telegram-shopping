<?php

namespace App\Http\Telegram\Fathers;

use App\Models\Chat;

class Command
{

    protected Chat $chat;

    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

}
