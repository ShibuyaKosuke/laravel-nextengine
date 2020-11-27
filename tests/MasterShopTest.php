<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop\MasterShop;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop\MasterShop as MasterShopBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop\MasterShopMailAddress;
use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;

/**
 * 店舗マスタ
 *
 * Class MasterShopTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterShopTest extends TestCase
{
    /**
     * 店舗マスタ検索
     */
    public function testMasterShopSearch()
    {
        $apiResultEntity = $this->object->masterShopSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterShopBase::class, $data);
        }
    }

    /**
     * 店舗マスタ件数
     */
    public function testMasterShopCount()
    {
        $apiResultEntity = $this->object->masterShopCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 店舗マスタメールアドレス
     *
     * @todo
     */
    public function testMasterShopMailAddress()
    {
        $apiResultEntity = $this->object->masterShopMailAddress(1);

        self::assertInstanceOf(MasterShopMailAddress::class, $apiResultEntity->data);
    }

    /**
     * 店舗マスタ追加
     */
    public function testMasterShopCreate()
    {
        $masterShop = new MasterShop();

        $masterShop->shop_name = 'テスト追加';
        $masterShop->shop_abbreviated_name = 'shop_abbreviated_name';
        $masterShop->shop_mall_id = 1;
        $masterShop->shop_tax_id = 1;
        $masterShop->shop_tax_calculation_sequence_id = 1;
        $masterShop->shop_currency_unit_id = 1;

        $apiResultEntity = $this->object->masterShopCreate($masterShop, 1);
        self::assertGreaterThanOrEqual(1, $apiResultEntity->shop_id);
    }

    /**
     * 店舗マスタ更新
     *
     *
     */
    public function testMasterShopUpdate()
    {
        $this->expectException(NextEngineException::class);

        $masterShop = new MasterShop(
            [
                "shop_id" => "2",
                "shop_name" => "テストAmazon店舗",
                "shop_abbreviated_name" => "AMZ",
                "shop_mall_id" => "11",
                "shop_tax_id" => "0",
                "shop_tax_calculation_sequence_id" => "0",
                "shop_currency_unit_id" => "1",
                "shop_last_modified_date" => "2020-09-30 12:17:34"
            ]
        );

        $masterShop->shop_name = 'Test Amazon店舗';

        $apiResultEntity = $this->object->masterShopUpdate($masterShop);
        self::assertEquals('success', $apiResultEntity->result);
    }
}
