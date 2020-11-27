<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemImage\SystemImage;

/**
 * 画像分類タグ
 *
 * Class SystemImageTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemImageTest extends TestCase
{
    /**
     * 画像分類タグ検索
     */
    public function testSystemImageSearch()
    {
        $apiResultEntity = $this->object->systemImageSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemImage::class, $data);
        }
    }

    /**
     * 画像分類タグ件数
     */
    public function testSystemImageCount()
    {
        $apiResultEntity = $this->object->systemImageCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
