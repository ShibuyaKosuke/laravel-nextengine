<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemPayment\SystemPaymentMethod;

/**
 * 支払区分情報
 *
 * Class SystemPaymentTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemPaymentTest extends TestCase
{
    /**
     * 支払区分情報
     */
    public function testSystemPaymentMethod()
    {
        $apiResultEntity = $this->object->systemPaymentMethod();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemPaymentMethod::class, $data);
        }
    }
}
