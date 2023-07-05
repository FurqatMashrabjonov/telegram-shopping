<?php

namespace App\Http\Telegram\Middleware;

use App\Http\Telegram\ReplyMarkups\Keyboard;
use App\Models\Chat;
use Illuminate\Support\Facades\Log;

class CheckLanguage
{

    public static function languageSelected($chat_id){
        $chat = Chat::query()->where('chat_id', $chat_id)->first();
        return !is_null($chat->lang);
    }

    public static function askLanguage($chat_id): void
    {
        $chat = Chat::query()->where('chat_id', $chat_id)->first();
        $chat->html('Please select your language')
            ->replyKeyboard(Keyboard::language())
            ->send();
    }

}
