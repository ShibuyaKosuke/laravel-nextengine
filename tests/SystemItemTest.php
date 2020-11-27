<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemItem\SystemItem;

/**
 * 項目名情報
 *
 * Class SystemItemTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemItemTest extends TestCase
{
    /**
     * 項目名情報
     */
    public function testSystemItem()
    {
        $apiResultEntity = $this->object->systemItem();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemItem::class, $data);
        }
    }
}
