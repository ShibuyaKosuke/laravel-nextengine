<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemFraction\SystemFraction;

/**
 * 端数処理区分情報
 *
 * Class SystemFractionTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemFractionTest extends TestCase
{
    /**
     * 発送方法区分情報
     */
    public function testSystemFraction()
    {
        $apiResultEntity = $this->object->systemFraction();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemFraction::class, $data);
        }
    }
}
