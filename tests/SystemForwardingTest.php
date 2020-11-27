<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemForwarding\SystemForwardingMethod;

/**
 * 輸送区分情報
 *
 * Class SystemForwardingTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemForwardingTest extends TestCase
{
    /**
     * 輸送区分情報
     */
    public function testSystemForwardingMethod()
    {
        $apiResultEntity = $this->object->systemForwardingMethod();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemForwardingMethod::class, $data);
        }
    }
}
