<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemQue\SystemQue;

/**
 * アップロードキュー
 *
 * Class SystemQueTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemQueTest extends TestCase
{
    /**
     * アップロードキュー検索
     */
    public function testSystemQueSearch()
    {
        $apiResultEntity = $this->object->systemQueSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemQue::class, $data);
        }
    }

    /**
     * アップロードキュー件数
     */
    public function testSystemQueCount()
    {
        $apiResultEntity = $this->object->systemQueCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
