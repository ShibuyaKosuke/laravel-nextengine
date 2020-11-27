<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrder;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrderCondition;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrderStatus;

/**
 * 発注区分情報
 *
 * Class SystemOrderTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemOrderTest extends TestCase
{
    /**
     * 発注区分情報
     */
    public function testSystemOrder()
    {
        $apiResultEntity = $this->object->systemOrder();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemOrder::class, $data);
        }
    }

    /**
     * 発注条件区分情報
     */
    public function testSystemOrderCondition()
    {
        $apiResultEntity = $this->object->systemOrderCondition();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemOrderCondition::class, $data);
        }
    }

    /**
     * 受注状態区分情報
     */
    public function testSystemOrderStatus()
    {
        $apiResultEntity = $this->object->systemOrderStatus();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemOrderStatus::class, $data);
        }
    }
}
