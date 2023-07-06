<?php

namespace App\Http\Telegram\ReplyMarkups;

use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;

class Keyboard
{

    public static function main()
    {
        return ReplyKeyboard::make()
            ->row([
                ReplyButton::make('Products')->requestContact(),
                ReplyButton::make('Categories')->requestLocation(),
            ])
            ->row([
                ReplyButton::make('Settings')->requestQuiz(),
            ]);
    }

    public static function language(){
       return ReplyKeyboard::make()
            ->row([
                ReplyButton::make('🇺🇿O\'zbekcha'),
                ReplyButton::make('🇷🇺Русский'),
            ])
            ->row([
                ReplyButton::make('🇺🇸English'),
            ])->resize()->oneTime();
    }
    public static function phone(){
        return ReplyKeyboard::make()
            ->row([
                ReplyButton::make('📞 Відправити номер телефону')->requestContact(),
               ])->resize()->oneTime();
    }
}
