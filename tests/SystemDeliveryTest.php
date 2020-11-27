<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery\SystemDelivery;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery\SystemDeliveryDate;

/**
 * 発送方法区分情報
 *
 * Class SystemDeliveryTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemDeliveryTest extends TestCase
{
    /**
     * 発送方法区分情報
     */
    public function testSystemDelivery()
    {
        $apiResultEntity = $this->object->systemDelivery();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemDelivery::class, $data);
        }
    }

    /**
     * 納期情報
     */
    public function testSystemDeliveryDate()
    {
        $apiResultEntity = $this->object->systemDeliveryDate();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemDeliveryDate::class, $data);
        }
    }
}
