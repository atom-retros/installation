<?php

namespace Atom\Installation\Tests;

use Atom\Installation\InstallationServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * Load package service provider.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Atom\\Installation\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    /**
     * Define environment setup.
     */
    protected function getPackageProviders($app)
    {
        return [
            InstallationServiceProvider::class,
        ];
    }
}
