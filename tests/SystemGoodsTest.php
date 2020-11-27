<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods\SystemGoodsStatus;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods\SystemGoodsType;

/**
 * 商品区分情報
 *
 * Class SystemGoodsTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemGoodsTest extends TestCase
{
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
