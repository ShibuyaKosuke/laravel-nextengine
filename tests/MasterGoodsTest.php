<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoods;
<<<<<<< HEAD
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsTag;
=======
>>>>>>> main
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
<<<<<<< HEAD
     * 商品検索
=======
     * 受注伝票検索
>>>>>>> main
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
<<<<<<< HEAD
     * 商品件数
=======
     * 受注伝票件数
>>>>>>> main
     */
    public function testMasterGoodsCount()
    {
        $apiResultEntity = $this->object->receiveMasterGoodsCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
<<<<<<< HEAD
     * 商品アップロード
=======
     * 受注伝票件数
>>>>>>> main
     */
    public function testMasterGoodsUpload()
    {
        $apiResultEntity = $this->object->receiveMasterGoodsUpload();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
<<<<<<< HEAD

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
=======
>>>>>>> main
}