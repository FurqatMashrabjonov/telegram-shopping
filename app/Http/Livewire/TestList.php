<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Query\Builder;
use Livewire\Component;

class TestList extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->searchable()->sortable(),
        ];
    }

    public function render()
    {
        return view('livewire.test-list');
    }
}
