<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            $configs = Config::all();
            View::share('configs', $configs);
        } catch (\Illuminate\Database\QueryException $e) {
            View::share('configs', null);
        }
    }
}
