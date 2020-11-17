<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemQue\SystemQue;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * アップロードキュー
 *
 * Class SystemQueTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemQueTest extends TestCase
{
    private $object;

    /**
     * @return void
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
     * アップロードキュー検索
     */
    public function testSystemQueSearch()
    {
        $apiResultEntity = $this->object->systemQueSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemQue::class, $data);
        }
    }

    /**
     * アップロードキュー件数
     */
    public function testSystemQueCount()
    {
        $apiResultEntity = $this->object->systemQueCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
