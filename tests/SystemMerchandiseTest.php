<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemMerchandise\SystemMerchandise;

/**
 * 取扱区分情報
 *
 * Class SystemMerchandiseTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemMerchandiseTest extends TestCase
{
    /**
     * 発注区分情報
     */
    public function testSystemMerchandise()
    {
        $apiResultEntity = $this->object->systemMerchandise();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemMerchandise::class, $data);
        }
    }
}
