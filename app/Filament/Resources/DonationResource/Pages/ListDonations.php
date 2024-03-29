<?php

namespace App\Filament\Resources\DonationResource\Pages;

use App\Filament\Resources\DonationResource;
use App\Filament\Widgets\DonationHistories;
use App\Models\Donation;
use Filament\Forms\Components\Builder;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDonations extends ListRecords
{
    protected static string $resource = DonationResource::class;

    protected static ?string $title = 'Donasi Yang Berlangsung';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
    // protected function getFooterWidgets(): array
    // {
    //     return [
    //         DonationHistories::class
    //     ];
    // }

    // protected function getFooterWidgetsColumns(): int | array
    // {
    //     return 1;
    // }
}
