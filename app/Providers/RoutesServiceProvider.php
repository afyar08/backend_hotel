<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class RoutesServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->configureApiRoutes();

        $this->configureWebRoutes();
    }

    /**
     * Configure the routes for the API.
     *
     * @return void
     */
    protected function configureApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace('App\Http\Controllers\API') // Sesuaikan dengan namespace controller API Anda
            ->group(base_path('routes/api.php'));
    }

    /**
     * Configure the routes for the web.
     *
     * @return void
     */
    protected function configureWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Web') // Sesuaikan dengan namespace controller Web Anda
            ->group(base_path('routes/web.php'));
    }
}