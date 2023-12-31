<?php

namespace App\Http\Telegram;

use App\Http\Telegram\Helpers\ActionHelper;
use App\Http\Telegram\Middleware\CheckLanguage;
use App\Http\Telegram\Middleware\CheckPhone;
use App\Http\Telegram\Strings\StringCheck;
use DefStudio\Telegraph\DTO\Chat;
use DefStudio\Telegraph\Handlers\WebhookHandler as Handler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;
use App\Http\Telegram\Traits\CallbackQueryHandle;

class WebhookHandle extends Handler
{

    use CallbackQueryHandle;

    protected function handleChatMessage(Stringable $text): void
    {
        if (!CheckLanguage::languageSelected($this->chat->chat_id)) {
            CheckLanguage::askLanguage($this->chat->chat_id);
            return;
        }

        if (!CheckPhone::checkPhone($this->chat->chat_id)) {
            CheckPhone::askPhone($this->chat->chat_id);
            return;
        }

        if (ActionHelper::getAction($this->chat->chat_id) === \App\Enums\Action::ENTERING_PHONE) {
            $text = $this->message->contact()->phoneNumber();
        }
        StringCheck::check($this->chat->chat_id, $text);
    }

    protected function handleUnknownCommand(Stringable $text): void
    {
        if ($this->message?->chat()?->type() === Chat::TYPE_PRIVATE) {
            $command = (string) $text->after('/')->before(' ')->before('@');

            if(is_null($this->chat->from)){
                $this->chat->from = $this->message->from()->toArray();
                $this->chat->save();
            }

            if (!CheckLanguage::languageSelected($this->chat->chat_id)) {
                CheckLanguage::askLanguage($this->chat->chat_id);
                return;
            }

            if (!CheckPhone::checkPhone($this->chat->chat_id)) {
                CheckPhone::askPhone($this->chat->chat_id);
                return;
            }

            (new CommandHandle($command))->handle($this->chat);
        }
    }
}
