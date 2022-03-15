<?php

namespace Buglinjo\LaravelWebp;

use Illuminate\Support\ServiceProvider;

class WebpServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-webp.php' => config_path('laravel-webp.php'),
        ], 'laravel-assets');

        $this->publishes([
            __DIR__ . '/../config/laravel-webp.php' => config_path('laravel-webp.php'),
        ], 'config');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('webp', function () {
            return new Webp();
        });
    }
}
