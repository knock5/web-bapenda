<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelResource\Pages;
use App\Filament\Resources\HotelResource\RelationManagers;
use App\Models\Hotel;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Data Hotel';

    protected static ?string $navigationGroup = 'Data';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->label('Nama Hotel')->required(),
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
                    Select::make('rating')
                        ->label('Rating Hotel')
                        ->placeholder('Pilih Rating Hotel')
                        ->options([
                            1 => '★',
                            2 => '★★',
                            3 => '★★★',
                            4 => '★★★★',
                            5 => '★★★★★',
                        ])
                        ->required(),
                    Textarea::make('amenities')->label('Fasilitas')->placeholder('Gym, Wi-Fi, dll.'),
                    TextInput::make('revenue')->label('Pendapatan')->numeric()->prefix('Rp')->required(),
                    TextInput::make('tax_rate')->label('Pajak (%)')->numeric()->rules(['regex:/^\d+(\.\d{1,2})?$/'])->required()->placeholder('ex. 2,5'),
                    TextInput::make('tax_id_number')->label('Pajak ID')->numeric()->required(),
                    DatePicker::make('tax_due_date')->label('Jatuh Tempo')->required(),
                    DatePicker::make('last_tax_payment')->label('Terakhir Pembayaran'),
                    Select::make('is_tax_paid')
                        ->label('Status')
                        ->placeholder('Pilih Status Pembayaran')
                        ->options([
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
                BadgeColumn::make('is_tax_paid')->label('Status')->getStateUsing(function ($record) {
                    return $record->is_tax_paid ? 'Lunas' : 'Belum Lunas';
                })->colors([
                    'danger' => fn ($state) => $state === 'Belum Lunas',    
                    'success' => fn ($state) => $state === 'Lunas',    
                ])->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->alignCenter()->sortable()->searchable(),
                TextColumn::make('tax_rate')->label('Pajak(%)')->alignCenter()->sortable()->searchable(),
                TextColumn::make('tax_due_date')->label('Jatuh Tempo')->dateTime('d F Y')->alignCenter()->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    LinkAction::make('view')->icon('heroicon-o-eye')->url(fn($record) => route('hotel.detail', $record)),
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
            'index' => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotel::route('/create'),
            'edit' => Pages\EditHotel::route('/{record}/edit'),
        ];
    }
}
