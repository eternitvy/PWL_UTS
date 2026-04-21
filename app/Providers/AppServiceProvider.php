<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PenjualanDetail;
use App\Observers\PenjualanDetailObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        PenjualanDetail::observe(PenjualanDetailObserver::class);
    }
}
