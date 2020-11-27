<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemIo\SystemIoType;

class SystemIoTest extends TestCase
{
    /**
     * 返品事由区分情報
     */
    public function testSystemIoType()
    {
        $apiResultEntity = $this->object->systemIoType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemIoType::class, $data);
        }
    }
}
