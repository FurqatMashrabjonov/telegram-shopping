<?php

namespace App\Http\Telegram\Middleware;

use App\Http\Telegram\Helpers\ActionHelper;
use App\Http\Telegram\ReplyMarkups\Keyboard;
use App\Models\Action;
use App\Models\Chat;

class CheckPhone
{

    public static function checkPhone($chat_id){
        $chat = Chat::query()->where('chat_id', $chat_id)->first();
        return !is_null($chat->phone);
    }

    public static function askPhone($chat_id): void
    {
        $chat = Chat::query()->where('chat_id', $chat_id)->first();
        $chat->html(__('telegram.ask_phone', [], $chat->lang))
            ->replyKeyboard(Keyboard::phone())
            ->send();
       ActionHelper::setAction($chat_id, \App\Enums\Action::ENTERING_PHONE);
    }

    public static function setPhone($chat_id, $phone): void
    {
        $chat = Chat::query()->where('chat_id', $chat_id)->first();
        $chat->phone = $phone;
        $chat->save();
        ActionHelper::deleteAction($chat_id);
    }

}
