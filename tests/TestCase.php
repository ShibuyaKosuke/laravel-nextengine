<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Providers\ServiceProvider;

/**
 * Class TestCase
 * @package ShibuyaKosuke\LaravelCrudCommand\Test
 */
abstract class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => 'homestead',
            'username' => 'homestead',
            'password' => 'secret',
        ]);
    }

    /**
     * @param Application $app
     */
    protected function useMySqlConnection(Application $app)
    {
        $app->config->set('database.default', 'mysql');
    }

    /**
     * @param Application $app
     */
    protected function usePostgreSqlConnection(Application $app): void
    {
        $app->config->set('database.default', 'pgsql');
    }

    /**
     * @param Application $app
     * @return array|string[]
     */
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    /**
     * @param Application $app
     * @return array|string[]
     */
    protected function getPackageAliases($app)
    {
        return [
            'NextEngine' => NextEngine::class
        ];
    }
}
