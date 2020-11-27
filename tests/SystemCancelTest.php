<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCancel\SystemCancelType;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

class SystemCancelTest extends TestCase
{
    /**
     * 返品事由区分情報
     */
    public function testSystemCancelType()
    {
        $apiResultEntity = $this->object->systemCancelType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemCancelType::class, $data);
        }
    }
}
