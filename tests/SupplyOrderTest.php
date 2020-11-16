<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder\SupplyOrder;
use ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder\SupplyOrderRow;
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
     * 仕入伝票検索
     */
    public function testSupplyOrderSearch()
    {
        $apiResultEntity = $this->object->supplyOrderSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SupplyOrder::class, $data);
        }
    }

    /**
     * 仕入伝票件数
     */
    public function testSupplyOrderCount()
    {
        $apiResultEntity = $this->object->supplyOrderCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 仕入明細検索
     */
    public function testSupplyOrderRowSearch()
    {
        $apiResultEntity = $this->object->supplyOrderRowSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SupplyOrderRow::class, $data);
        }
    }

    /**
     * 仕入明細件数
     */
    public function testSupplyOrderRowCount()
    {
        $apiResultEntity = $this->object->supplyOrderRowCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
