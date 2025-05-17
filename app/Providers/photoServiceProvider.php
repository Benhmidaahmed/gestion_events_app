<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class photoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Services\Interfaces\PhotoServiceInterface',
            'App\Services\PhotoService'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
