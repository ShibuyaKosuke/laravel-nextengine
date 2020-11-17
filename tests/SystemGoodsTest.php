<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods\SystemGoodsStatus;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods\SystemGoodsType;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 商品区分情報
 *
 * Class SystemGoodsTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemGoodsTest extends TestCase
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
     * 商品区分情報
     */
    public function testSystemGoodsType()
    {
        $apiResultEntity = $this->object->systemGoodsType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemGoodsType::class, $data);
        }
    }

    /**
     * 商品ステータス区分情報
     */
    public function testSystemGoodsStatus()
    {
        $apiResultEntity = $this->object->systemGoodsStatus();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemGoodsStatus::class, $data);
        }
    }
}
