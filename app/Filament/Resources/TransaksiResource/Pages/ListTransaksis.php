<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use App\Filament\Resources\TransaksiResource;
use App\Models\Hotel;
use App\Models\Pembayaran;
use App\Models\Restaurant;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListTransaksis extends ListRecords
{
    protected static string $resource = TransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): ?Builder
    {
        $user = Auth::user();
        $restaurantIds = Restaurant::where('user_id', $user->id)->pluck('restaurant_id');
        $hotelIds = Hotel::where('user_id', $user->id)->pluck('hotel_id');

        return Pembayaran::query()
            ->whereIn('restaurant_id', $restaurantIds)
            ->orWhereIn('hotel_id', $hotelIds);
    }
}
