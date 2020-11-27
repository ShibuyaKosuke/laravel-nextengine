<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterStock\MasterStock;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 在庫マスタ
 *
 * Class MasterStockTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterStockTest extends TestCase
{
    /**
     * 在庫検索
     */
    public function testMasterStockSearch()
    {
        $apiResultEntity = $this->object->masterStockSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterStock::class, $data);
        }
    }

    /**
     * 在庫件数
     */
    public function testMasterStockCount()
    {
        $apiResultEntity = $this->object->masterStockCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
