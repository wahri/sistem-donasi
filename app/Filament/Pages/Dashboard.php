<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BasePage;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class Dashboard extends BasePage
{
    protected static ?string $model = RequestDonation::class;
    protected function getColumns(): int | string | array
    {
        return 1;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
}
