<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationResource\Pages;
use App\Filament\Resources\DonationResource\RelationManagers;
use App\Models\Donation;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class DonationResource extends Resource
{
    use Forms\Concerns\InteractsWithForms;
    protected static ?string $model = Donation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Berikan Donasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Hidden::make('user_id')
                            ->required(),
                        Hidden::make('slug')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->reactive()
                            ->afterStateUpdated(function (Closure $set, $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->required()
                            ->maxLength(255)
                            ->label(__('Nama Makanan'))
                            ->placeholder('Ex: Nasi Kotak, Pisang, Sayuran, dsb.'),
                        Forms\Components\DateTimePicker::make('expired_donation')
                            ->required()->label(__('Perkiraan Tanggal Kadaluarsa')),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('stock')
                                    ->numeric()
                                    ->minValue(1)
                                    ->required()->label(__('Jumlah Porsi'))->columns(2),
                                TextInput::make('unit')
                                    ->required()
                                    ->maxLength(255)
                                    ->label(__('Tipe Porsi'))
                                    ->placeholder('Ex: Kotak, Kilogram, Porsi, dsb.'),
                            ]),
                        Hidden::make('status')
                            ->required(),
                        RichEditor::make('description')
                            ->maxLength(65535)->label(__('Keterangan Tambahan')),
                        FileUpload::make('image')
                            ->required()->label(__('Tambahkan Gambar')),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('status'),
                ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('expired_donation')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'view' => Pages\ViewDonation::route('/{record}'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->whereBelongsTo(auth()->user());;
    }
}
