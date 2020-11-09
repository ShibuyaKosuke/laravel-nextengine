<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine\Providers;

use Illuminate\Support\ServiceProvider as ServiceProviderBase;
use ShibuyaKosuke\LaravelNextEngine\Console\NextEngineCommand;
use ShibuyaKosuke\LaravelNextEngine\NextEngine;

/**
 * Class ServiceProvider
 * @package ShibuyaKosuke\LaravelNextengine\Providers
 */
class ServiceProvider extends ServiceProviderBase
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadFactoriesFrom(__DIR__ . '/../../factories');

        $this->loadMigrationsFrom(__DIR__ . '/../../migrations');

        $this->publishes(
            [
                __DIR__ . '/../../config/nextengine.php' => config_path('nextengine.php'),
                __DIR__ . '/../../migrations' => database_path('migrations'),
            ]
        );

        $this->app->singleton(
            'nextengine.refresh-tokens',
            function ($app) {
                return new NextEngineCommand($app);
            }
        );

        $this->commands(
            [
                'nextengine.refresh-tokens',
            ]
        );
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/nextengine.php', 'nextengine');

        $this->app->singleton(
            'nextengine.client',
            function ($app) {
                return new NextEngine($app);
            }
        );
    }

    /**
     * @return array|string[]
     */
    public function provides(): array
    {
        return [
            'nextengine.refresh-tokens',
        ];
    }
}
