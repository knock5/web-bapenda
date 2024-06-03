<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\Hotel;
use App\Models\Restaurant;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Restaurants', Restaurant::count())
                ->icon('heroicon-o-building-storefront')
                ->description('Total seluruh data restaurant yang ada di Lamongan.')
                ->color('info'),
            Card::make('Hotels', Hotel::count())
                ->icon('heroicon-o-building-office')
                ->description('Total seluruh data hotel yang ada di Lamongan.')
                ->color('info'),
        ];
    }
}
