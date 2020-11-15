<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoods;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsTag;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

class MasterGoodsTest extends TestCase
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
     * 商品検索
     */
    public function testMasterGoodsSearch()
    {
        $apiResultEntity = $this->object->receiveMasterGoodsSearch();

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
        $apiResultEntity = $this->object->receiveMasterGoodsCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 商品アップロード
     */
    public function testMasterGoodsUpload()
    {
        $apiResultEntity = $this->object->receiveMasterGoodsUpload();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 商品タグ検索
     */
    public function testMasterGoodsTagSearch()
    {
        $apiResultEntity = $this->object->receiveMasterGoodsTagSearch();

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
        $apiResultEntity = $this->object->receiveMasterGoodsTagCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}