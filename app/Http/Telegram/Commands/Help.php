<?php

namespace App\Http\Telegram\Commands;

use App\Http\Telegram\Fathers\Command;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Help extends Command
{

    public function handle(): void
    {
        $this->chat->html('Help')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Delete')->action('delete')->param('id', '42'),
                Button::make('open')->url('https://test.it'),
                Button::make('Web App')->webApp('https://web-app.test.it'),
            ]))->send();
    }

}
