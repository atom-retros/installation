<?php

namespace Atom\Installation;

use Illuminate\Support\ServiceProvider;

class InstallationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            path: __DIR__.'/../config/installation.php',
            key: 'installation'
        );

        $this->loadMigrationsFrom(
            paths: __DIR__.'/../database/migrations'
        );

        $this->loadJsonTranslationsFrom(
            path: __DIR__.'/../resources/lang'
        );

        $this->loadViewsFrom(
            path: __DIR__.'/../resources/views',
            namespace: 'installation',
        );

        $this->loadRoutesFrom(
            path: __DIR__.'/../routes/web.php'
        );
    }
}
