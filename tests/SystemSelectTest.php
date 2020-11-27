<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemSelect\SystemSelect;

/**
 * 商品選択肢区分情報
 *
 * Class SystemSelectTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemSelectTest extends TestCase
{
    /**
     * 商品選択肢区分情報
     */
    public function testSystemSelect()
    {
        $apiResultEntity = $this->object->systemSelect();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemSelect::class, $data);
        }
    }
}
