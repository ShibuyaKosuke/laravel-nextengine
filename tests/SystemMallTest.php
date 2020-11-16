<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall\SystemMall;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * Class SystemMallTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemMallTest extends TestCase
{
    private $object;

    /**
     * @return void
     * @throws \ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');

        $this->getEnvironmentSetUp($this->app);

        $this->nextEngineApi = factory(NextEngineApi::class)->make();

        $this->nextEngineApi->uid = env('NEXT_ENGINE_UID');
        $this->nextEngineApi->state = env('NEXT_ENGINE_STATE');

        $response = NextEngine::setAccount($this->nextEngineApi)->getAccessToken();

        $this->object = NextEngine::setAccount($this->nextEngineApi);
    }

    /**
     * モール検索
     */
    public function testSystemMallSearch()
    {
        $apiResultEntity = $this->object->systemMallSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemMall::class, $data);
        }
    }

    /**
     * モール件数
     */
    public function testSystemMallCount()
    {
        $apiResultEntity = $this->object->systemMallCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}