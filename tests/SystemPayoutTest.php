<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemPayout\SystemPayout;

/**
 * 支払方法区分情報
 *
 * Class SystemPayoutTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemPayoutTest extends TestCase
{
    /**
     * 支払方法区分情報
     */
    public function testSystemPayout()
    {
        $apiResultEntity = $this->object->systemPayout();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemPayout::class, $data);
        }
    }
}
