<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemTax\SystemTax;

/**
 * 税区分情報
 *
 * Class SystemTaxTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemTaxTest extends TestCase
{
    /**
     * 税区分情報
     */
    public function testSystemTax()
    {
        $apiResultEntity = $this->object->systemTax();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemTax::class, $data);
        }
    }
}
