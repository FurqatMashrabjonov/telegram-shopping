<?php

namespace App\Http\Telegram\Strings;


use App\Enums\Action;
use App\Http\Telegram\Helpers\ActionHelper;
use App\Http\Telegram\Helpers\LanguageHelper;
use App\Http\Telegram\Middleware\CheckLanguage;
use Illuminate\Support\Facades\Log;

class StringCheck
{

    public static function getStrings($lang = 'en')
    {

    }

    public static function check($chat_id, $text)
    {
        $action = ActionHelper::getAction($chat_id);
        Log::debug($action);
        if (!is_null($action)) {
            match ($action) {
                Action::SELECTING_LANGUAGE => CheckLanguage::setLanguage($chat_id, LanguageHelper::getLangSlug($text))
            };
        }

    }
}
