<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterSupplier\MasterSupplier as MasterSupplierBase;

/**
 * 仕入先マスタ
 *
 * Class MasterSupplier
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterSupplierTest extends TestCase
{
    /**
     * 仕入先マスタ検索
     */
    public function testMasterSupplierSearch()
    {
        $apiResultEntity = $this->object->masterSupplierSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterSupplierBase::class, $data);
        }
    }

    /**
     * 仕入先マスタ件数
     */
    public function testMasterSupplierCount()
    {
        $apiResultEntity = $this->object->masterSupplierCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
