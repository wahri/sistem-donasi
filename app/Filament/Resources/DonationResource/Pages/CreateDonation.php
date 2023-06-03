<?php

namespace App\Filament\Resources\DonationResource\Pages;

use App\Filament\Resources\DonationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateDonation extends CreateRecord
{
    protected static string $resource = DonationResource::class;


    public function mount(): void
    {
        $this->form->fill([
            'user_id' => Auth::id(),
            'status' => 1,
        ]);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
