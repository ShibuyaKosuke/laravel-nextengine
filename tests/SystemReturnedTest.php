<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemReturned\SystemReturnedReason;

/**
 * 返品事由区分情報
 *
 * Class SystemReturnedTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemReturnedTest extends TestCase
{
    /**
     * 返品事由区分情報
     */
    public function testSystemReturnedReason()
    {
        $apiResultEntity = $this->object->systemReturnedReason();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemReturnedReason::class, $data);
        }
    }
}
