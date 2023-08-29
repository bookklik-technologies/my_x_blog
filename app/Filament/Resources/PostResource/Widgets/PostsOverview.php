<?php

namespace App\Filament\Resources\PostResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Posts', \App\Models\Post::count()),
        ];
    }

    public function getColumns(): int
    {
        return 6;
    }
}
