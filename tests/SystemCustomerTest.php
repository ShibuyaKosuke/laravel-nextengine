<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCustomer\SystemCustomerType;

/**
 * 顧客区分情報
 *
 * Class SystemCustomerTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemCustomerTest extends TestCase
{
    /**
     * 確認チェック区分情報
     */
    public function testSystemCustomerType()
    {
        $apiResultEntity = $this->object->systemCustomerType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemCustomerType::class, $data);
        }
    }
}
