<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder\PlaceOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder\PlaceOrderRow;

/**
 * 発注伝票
 *
 * Class MasterSupplier
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class PlaceOrderTest extends TestCase
{
    /**
     * 発注伝票検索
     */
    public function testPlaceOrderBaseSearch()
    {
        $apiResultEntity = $this->object->placeOrderBaseSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(PlaceOrderBase::class, $data);
        }
    }

    /**
     * 発注伝票件数
     */
    public function testPlaceOrderBaseCount()
    {
        $apiResultEntity = $this->object->placeOrderBaseCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 発注伝票検索
     */
    public function testPlaceOrderRowSearch()
    {
        $apiResultEntity = $this->object->placeOrderRowSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(PlaceOrderRow::class, $data);
        }
    }

    /**
     * 発注伝票件数
     */
    public function testPlaceOrderRowCount()
    {
        $apiResultEntity = $this->object->placeOrderRowCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
