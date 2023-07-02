<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DonationHistories extends BaseWidget
{
    protected static ?string $heading = "Riwayat Donasi";
    protected function getTableQuery(): Builder
    {
        return Donation::where('user_id', Auth::id())
            ->Where(function (Builder $query) {
                $currentDateTime = date('Y-m-d H:i:s');
                $query->where('stock', '<=', 0)
                    ->orWhere('expired_donation', '<=', $currentDateTime);
            });
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->whereBelongsTo(auth()->user());
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('stock'),
            ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('expired_donation')
                ->dateTime('d M Y'),
        ];
    }
}
