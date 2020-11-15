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
        /**
         * @deprecated loadFactoriesFrom() は Laravel8 以上で削除される。
         * その場合 laravel/legacy-factories パッケージをつかうこと。
         *
         * @see https://github.com/laravel/legacy-factories
         */
        $this->loadFactoriesFrom(__DIR__ . '/../../database/factories');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->publishes(
            [
                __DIR__ . '/../../config/nextengine.php' => config_path('nextengine.php'),
                __DIR__ . '/../../database/migrations' => database_path('migrations'),
                __DIR__ . '/../../database/factories' => database_path('factories'),
            ],
            'nextengine'
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
                return new NextEngine($app, $app->request->user());
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
