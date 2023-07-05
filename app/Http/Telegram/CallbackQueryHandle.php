<?php

namespace App\Http\Telegram;

use App\Models\Chat;
use DefStudio\Telegraph\DTO\Message;

class CallbackQueryHandle
{

    protected string $inline_query;

    public function __construct($inline_query)
    {
        $this->inline_query = $inline_query;
    }


    public function handle(Message $message): void
    {
        $class = 'App\\Http\\\\' . ucfirst($this->inline_query);
        if (class_exists($class))
            (new $class($message))->handle();
        else
            $message->chat()->html('command not found')->send();
    }

}
