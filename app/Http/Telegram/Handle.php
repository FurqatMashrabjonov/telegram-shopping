<?php

namespace App\Http\Telegram;

use App\Models\Bot;
use Illuminate\Support\Facades\Request;

class Handle
{

    public function __invoke($token, Request $request)
    {
        $bot = Bot::query()->where('token', $token)->firstOrFail();

        $bot->registerWebhook()->send();
    }

}

