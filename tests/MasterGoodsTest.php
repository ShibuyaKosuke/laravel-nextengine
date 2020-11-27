<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoods;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsImage;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsImageTag;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsTag;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsWholesale;
use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;

/**
 * Class MasterGoodsTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterGoodsTest extends TestCase
{
    /**
     * 商品検索
     */
    public function testMasterGoodsSearch()
    {
        $apiResultEntity = $this->object->masterGoodsSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterGoods::class, $data);
        }
    }

    /**
     * 商品件数
     */
    public function testMasterGoodsCount()
    {
        $apiResultEntity = $this->object->masterGoodsCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 商品アップロード
     */
    public function testMasterGoodsUpload()
    {
        $this->expectException(NextEngineException::class);
        $this->object->masterGoodsUpload();
    }

    /**
     * 商品タグ検索
     */
    public function testMasterGoodsTagSearch()
    {
        $apiResultEntity = $this->object->masterGoodsTagSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterGoodsTag::class, $data);
        }
    }

    /**
     * 商品タグ件数
     */
    public function testMasterGoodsTagCount()
    {
        $apiResultEntity = $this->object->masterGoodsTagCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 商品画像検索
     */
    public function testMasterGoodsImageSearch()
    {
        $apiResultEntity = $this->object->masterGoodsImageSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterGoodsImage::class, $data);
        }
    }

    /**
     * 商品画像件数
     */
    public function testMasterGoodsImageCount()
    {
        $apiResultEntity = $this->object->masterGoodsImageCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 商品画像タグ検索
     */
    public function testMasterGoodsImageTagSearch()
    {
        $apiResultEntity = $this->object->masterGoodsImageTagSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterGoodsImageTag::class, $data);
        }
    }

    /**
     * 商品画像タグ件数
     */
    public function testMasterGoodsImageTagCount()
    {
        $apiResultEntity = $this->object->masterGoodsImageTagCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 商品カテゴリ検索
     */
    public function testMasterGoodsCategorySearch()
    {
        $apiResultEntity = $this->object->masterGoodsCategorySearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterGoodsImageTag::class, $data);
        }
    }

    /**
     * 商品カテゴリ件数
     */
    public function testMasterGoodsCategoryCount()
    {
        $apiResultEntity = $this->object->masterGoodsCategoryCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 商品別卸先マスタ検索
     */
    public function testMasterGoodsWholesalSearch()
    {
        $apiResultEntity = $this->object->masterGoodsWholesaleSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterGoodsWholesale::class, $data);
        }
    }

    /**
     * 商品別卸先マスタ件数
     */
    public function testMasterGoodsWholesalCount()
    {
        $apiResultEntity = $this->object->masterGoodsWholesaleCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
