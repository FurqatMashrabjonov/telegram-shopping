<?php

namespace App\Http\Telegram\Middleware;

use App\Http\Telegram\Helpers\ActionHelper;
use App\Http\Telegram\ReplyMarkups\Keyboard;
use App\Models\Action;
use App\Models\Chat;

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
       ActionHelper::setAction($chat_id, \App\Enums\Action::SELECTING_LANGUAGE);
    }

    public static function setLanguage($chat_id, $lang): void
    {
        $chat = Chat::query()->where('chat_id', $chat_id)->first();
        $chat->lang = $lang;
        $chat->save();
        ActionHelper::deleteAction($chat_id);
    }

}
