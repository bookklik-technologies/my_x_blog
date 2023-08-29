<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Config;

class WelcomeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Welcome', Config::where('key', 'name')->first()->value),
        ];
    }

    public function getColumns(): int
    {
        return 6;
    }
}
