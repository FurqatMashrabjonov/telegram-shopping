<?php

namespace App\Http\Telegram\Commands;

use App\Http\Telegram\Fathers\Command;
use App\Http\Telegram\ReplyMarkups\Keyboard;

class Start extends Command
{

    public function handle(): void
    {
//        $photos = Telegraph::userProfilePhotos($this->chat->from['id'])->send();
//        Log::info($photos->json()['result']['photos']);

        $this->chat->html('Salom')
            ->replyKeyboard(Keyboard::language())
            ->send();
    }

}
