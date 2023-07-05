<?php

namespace App\Http\Telegram;

use App\Models\Chat;

class CommandHandle
{

    protected string $command;

    public function __construct($command)
    {
        $this->command = $command;
    }


    public function handle(Chat $chat): void
    {
        $command = 'App\\Http\\Telegram\\Commands\\' . ucfirst($this->command);
        if (class_exists($command))
            (new $command($chat))->handle();
        else
            $chat->html('command not found')->send();
    }

}
