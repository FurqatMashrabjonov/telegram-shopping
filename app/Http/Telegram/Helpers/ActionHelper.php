<?php

namespace App\Http\Telegram\Helpers;

use App\Models\Action;

class ActionHelper
{

    public static function getAction($chat_id)
    {
        return Action::query()->where('chat_id', $chat_id)->first()?->action;
    }

    public static function setAction($chat_id, $action)
    {
        Action::query()->updateOrCreate(['chat_id' => $chat_id], ['action' => $action]);
    }

    public static function deleteAction($chat_id)
    {
        Action::query()->where('chat_id', $chat_id)->delete();
    }

}
