<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCurrency\SystemCurrencyUnit;

/**
 * 通貨単位区分情報
 *
 * Class SystemCurrencyTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemCurrencyTest extends TestCase
{
    /**
     * 通貨単位区分情報
     */
    public function testSystemCurrencyUnit()
    {
        $apiResultEntity = $this->object->systemCurrencyUnit();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemCurrencyUnit::class, $data);
        }
    }
}
