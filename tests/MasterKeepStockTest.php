<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterKeepStock\MasterKeepStock;

/**
 * 区分け在庫マスタ
 *
 * Class MasterStockTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterKeepStockTest extends TestCase
{
    /**
     * 区分け在庫マスタ検索
     */
    public function testMasterKeepStockSearch()
    {
        $apiResultEntity = $this->object->masterKeepStockSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterKeepStock::class, $data);
        }
    }

    /**
     * 区分け在庫マスタ件数
     */
    public function testMasterKeepStockCount()
    {
        $apiResultEntity = $this->object->masterKeepStockCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
