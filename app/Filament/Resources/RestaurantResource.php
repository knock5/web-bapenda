<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantResource\Pages;
use App\Filament\Resources\RestaurantResource\RelationManagers;
use App\Models\Restaurant;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RestaurantResource extends Resource
{
    protected static ?string $model = Restaurant::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationLabel = 'Data Restaurant';

    protected static ?string $navigationGroup = 'Data';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                        TextInput::make('name')->label('Nama Restaurant')->required(),
                        Select::make('user_id')->label('Pemilik Usaha')
                            ->options(function () {
                                return User::whereHas('roles', function ($query) {
                                    $query->where('name', 'user');
                                })->get()->mapWithKeys(function ($user) {
                                    return [$user->id => "{$user->name} (ID: {$user->id})"];
                                })->toArray();
                            })
                            ->required()
                            ->searchable()
                            ->preload(),
                        TextInput::make('email')->label('Email')->required(),
                        TextInput::make('phone')->label('Telepon')->required(),
                        TextInput::make('address')->label('Alamat')->required(),
                        TextInput::make('opening_hours')->label('Jam Buka')->placeholder('ex. 10:00 WIB'),
                        TextInput::make('closing_hours')->label('Jam Tutup')->placeholder('ex. 22:00 WIB'),
                        TextInput::make('revenue')->label('Pendapatan')->numeric()->prefix('Rp')->minValue(0)->required(),
                        TextInput::make('tax_rate')->label('Pajak (%)')->numeric()->minValue(0)->rules(['regex:/^\d+(\.\d{1,2})?$/'])->required()->placeholder('ex. 2,5'),
                        TextInput::make('tax_id_number')->label('Pajak ID')->numeric()->minValue(0)->required(),
                        DatePicker::make('tax_due_date')->label('Jatuh Tempo')->required(),
                        DatePicker::make('last_tax_payment')->label('Terakhir Pembayaran'),
                        Select::make('is_tax_paid')->label('Status')->options([
                            0 => 'Belum Lunas', 
                            1 => 'Lunas'
                        ])->required()->helperText('Pilih Status Pembayaran'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama')->sortable()->searchable(),
                TextColumn::make('user.name')->label('Pemilik')->getStateUsing(function ($record) {
                    return "{$record->user->name} (ID: {$record->user->id})";
                })->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
                BadgeColumn::make('is_tax_paid')->label('Status')->getStateUsing(function ($record) {
                    return $record->is_tax_paid ? 'Lunas' : 'Belum Lunas';
                })->colors([
                    'danger' => fn ($state) => $state === 'Belum Lunas',    
                    'success' => fn ($state) => $state === 'Lunas',    
                ])->sortable()->searchable(),
                TextColumn::make('phone')->label('Telepon')->sortable()->searchable(),
                TextColumn::make('address')->label('Alamat')->sortable()->searchable(),
                TextColumn::make('opening_hours')->label('Jam Buka')->sortable()->searchable(),
                TextColumn::make('closing_hours')->label('Jam Tutup')->sortable()->searchable(),
                TextColumn::make('revenue')->label('Pendapatan')->sortable()->searchable(),
                TextColumn::make('tax_rate')->label('Pajak(%)')->sortable()->searchable(),
                TextColumn::make('tax_id_number')->label('Pajak ID')->sortable()->searchable(),
                TextColumn::make('tax_due_date')->label('Jatuh Tempo')->sortable()->searchable(),
                TextColumn::make('last_tax_payment')->label('Terakhir Pembayaran')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    LinkAction::make('view')->url(fn($record) => route('restaurant.detail', $record)),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),    
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListRestaurants::route('/'),
            'create' => Pages\CreateRestaurant::route('/create'),
            'edit' => Pages\EditRestaurant::route('/{record}/edit'),
        ];
    }
}
