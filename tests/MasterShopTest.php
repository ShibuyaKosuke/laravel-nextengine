<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop\MasterShop as  MasterShopBase;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 店舗マスタ
 *
 * Class MasterShopTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterShopTest extends TestCase
{
    private $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');

        $this->getEnvironmentSetUp($this->app);

        $this->nextEngineApi = factory(NextEngineApi::class)->make();

        $this->nextEngineApi->uid = env('NEXT_ENGINE_UID');
        $this->nextEngineApi->state = env('NEXT_ENGINE_STATE');

        $response = NextEngine::setAccount($this->nextEngineApi)->getAccessToken();

        $this->object = NextEngine::setAccount($this->nextEngineApi);
    }

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
//        dd($apiResultEntity);
    }
}