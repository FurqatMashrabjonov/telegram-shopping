<?php

namespace App\Http\Telegram\Helpers;

class LanguageHelper
{

    public static function getLangSlug($lang){
        return match ($lang){
            '🇺🇿O\'zbekcha' => 'uz',
            '🇷🇺Русский' => 'ru',
            '🇺🇸English' => 'en',
        };
    }

}
