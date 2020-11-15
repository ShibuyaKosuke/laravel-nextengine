<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder\SupplyOrder;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 仕入伝票マスタ
 *
 * Class MasterStockTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SupplyOrderTest extends TestCase
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
     * 在庫検索
     */
    public function testSupplyOrderSearch()
    {
        $apiResultEntity = $this->object->receiveSupplyOrderSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SupplyOrder::class, $data);
        }
    }

    /**
     * 在庫件数
     */
    public function testSupplyOrderCount()
    {
        $apiResultEntity = $this->object->receiveSupplyOrderCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
