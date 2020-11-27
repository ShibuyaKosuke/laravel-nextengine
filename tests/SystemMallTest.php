<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall\SystemMall;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall\SystemMallCategory;

/**
 * Class SystemMallTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemMallTest extends TestCase
{
    /**
     * モール検索
     */
    public function testSystemMallSearch()
    {
        $apiResultEntity = $this->object->systemMallSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemMall::class, $data);
        }
    }

    /**
     * モール件数
     */
    public function testSystemMallCount()
    {
        $apiResultEntity = $this->object->systemMallCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * モールカテゴリ検索
     */
    public function testSystemMallCategorySearch()
    {
        $apiResultEntity = $this->object->systemMallCategorySearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemMallCategory::class, $data);
        }
    }

    /**
     * モールカテゴリ件数
     */
    public function testSystemMallCategoryCount()
    {
        $apiResultEntity = $this->object->systemMallCategoryCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
