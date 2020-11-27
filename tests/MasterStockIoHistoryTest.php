<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterStockIoHistory\MasterStockIoHistory;

class MasterStockIoHistoryTest extends TestCase
{
    /**
     * 在庫検索
     */
    public function testMasterStockIoHistorySearch()
    {
        $apiResultEntity = $this->object->masterStockIoHistorySearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterStockIoHistory::class, $data);
        }
    }

    /**
     * 在庫件数
     */
    public function testMasterStockIoHistoryCount()
    {
        $apiResultEntity = $this->object->masterStockIoHistoryCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
