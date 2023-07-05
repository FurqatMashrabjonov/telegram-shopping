<?php

namespace App\Http\Telegram\Traits;

trait CallbackQueryHandle
{

    public function save(): void
    {
        $this->chat->html($this->data['id'])->send();
    }

}
