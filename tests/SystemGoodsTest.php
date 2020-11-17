<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

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
}
