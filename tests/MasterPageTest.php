<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage\MasterPage;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage\MasterPageBaseVariationOrOption;

/**
 * 商品ページ（基本）
 *
 * Class MasterPageTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterPageTest extends TestCase
{
    /**
     * 商品ページ（基本）検索
     */
    public function testMasterPageBaseSearch()
    {
        $apiResultEntity = $this->object->masterPageBaseSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterPage::class, $data);
        }
    }

    /**
     * 商品ページ（基本）件数
     */
    public function testMasterPageBaseCount()
    {
        $apiResultEntity = $this->object->masterPageBaseCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 商品ページ（基本-項目選択肢又はオプション）検索
     */
    public function testMasterPageBaseVariationOrOptionSearch()
    {
        $apiResultEntity = $this->object->masterPageBaseVariationOrOptionSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterPageBaseVariationOrOption::class, $data);
        }
    }

    /**
     * 商品ページ（基本-項目選択肢又はオプション）件数
     */
    public function tCount()
    {
        $apiResultEntity = $this->object->masterPageBaseVariationOrOptionCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
