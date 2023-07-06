<?php

namespace App\Http\Livewire\Admin;

use App\Models\Chat;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class ChatList extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return Chat::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('chat_id')->label(__('chat.chat_id')),
            TextColumn::make('from.username')->label(__('chat.username')),
            TextColumn::make('from.first_name')->label(__('chat.first_name')),
            TextColumn::make('from.last_name')->label(__('chat.last_name')),
            TextColumn::make('phone')->label(__('chat.phone')),
            TextColumn::make('lang') ->enum([
                'uz' => '🇺🇿O\'zbekcha',
                'ru' => '🇷🇺Русский',
                'en' => '🇺🇸English',
            ])->label(__('chat.lang')),
        ];
    }
    protected function getTableActions(): array
    {
        return [

        ];
    }

    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function isTablePaginationEnabled(): bool
    {
        return true;
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-bookmark';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return __('chat.empty_heading');
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return __('chat.empty_description');
    }


    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->where('from->username', 'LIKE', "%$searchQuery%")
                ->orWhere('from->first_name', 'LIKE', "%$searchQuery%")
                ->orWhere('from->last_name', 'LIKE', "%$searchQuery%");
        }

        return $query;
    }


    public function render()
    {
        return view('livewire.admin.chat-list');
    }
}
