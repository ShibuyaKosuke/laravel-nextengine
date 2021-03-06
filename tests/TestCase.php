<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;
use ShibuyaKosuke\LaravelNextEngine\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Providers\ServiceProvider;

/**
 * Class TestCase
 * @package ShibuyaKosuke\LaravelCrudCommand\Test
 */
abstract class TestCase extends OrchestraTestCase
{
    /**
     * @var NextEngine
     */
    protected $object;

    /**
     * @var NextEngineApi
     */
    protected $nextEngineApi;

    /**
     * Setup the test environment.
     * @return void
     * @throws NextEngineException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');

        $this->getEnvironmentSetUp($this->app);

        $this->nextEngineApi = factory(NextEngineApi::class)->make();

        $this->nextEngineApi->uid = env('NEXT_ENGINE_UID');
        $this->nextEngineApi->state = env('NEXT_ENGINE_STATE');

        $this->setClient(new Client());

        $this->startSession();
    }

    /**
     * @param ClientInterface $client
     * @throws NextEngineException
     */
    public function setClient(ClientInterface $client)
    {
        $nextEngine = new NextEngine($this->app, $client);
        $this->object = $nextEngine->setAccount($this->nextEngineApi);
    }

    /**
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('database.default', 'mysql');
        $app['config']->set(
            'database.connections.mysql',
            [
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '3306',
                'database' => 'homestead',
                'username' => 'homestead',
                'password' => 'secret',
            ]
        );

        $app->make('Illuminate\Contracts\Http\Kernel')
            ->pushMiddleware('Illuminate\Session\Middleware\StartSession');
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

    protected function assertEqualsApiResponseSearch($apiResultEntity)
    {
        self::assertEquals('success', $apiResultEntity->result);
        self::assertNotNull($apiResultEntity->count);
        self::assertNotNull($apiResultEntity->data);
        self::assertNotNull($apiResultEntity->access_token);
        self::assertNotNull($apiResultEntity->refresh_token);
    }

    protected function assertEqualsApiResponseCount($apiResultEntity)
    {
        self::assertEquals('success', $apiResultEntity->result);
        self::assertNotNull($apiResultEntity->count);
        self::assertNull($apiResultEntity->data);
        self::assertNotNull($apiResultEntity->access_token);
        self::assertNotNull($apiResultEntity->refresh_token);
    }
}
