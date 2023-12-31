<?php

namespace App\Http\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Chat extends Component implements HasForms
{
    use InteractsWithForms;

    public function render()
    {
        return view('livewire.chat');
    }
}
