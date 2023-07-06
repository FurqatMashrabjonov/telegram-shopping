<?php

namespace App\Http\Livewire\Admin;

use App\Enums\SmsProviderStatus;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class SmsProvider extends Component implements HasTable
{

    use InteractsWithTable;

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return \App\Models\SmsProvider::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label(__('sms-provider.name')),
            TextColumn::make('provider')->label(__('sms-provider.provider')),
            TextColumn::make('status')->enum([
                SmsProviderStatus::ACTIVE => __('sms-provider.active'),
                SmsProviderStatus::INACTIVE => __('sms-provider.inactive'),
            ])->label(__('sms-provider.status')),
            TextColumn::make('default')->enum([
                true => __('sms-provider.default'),
            ])->label(__('sms-provider.default')),
        ];
    }

    protected function getTableActions(): array
    {
        return [

        ];
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
        return __('sms-provider.empty_heading');
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return __('sms-provider.empty_description');
    }

    public function render()
    {
        return view('livewire.admin.sms-provider');
    }
}
