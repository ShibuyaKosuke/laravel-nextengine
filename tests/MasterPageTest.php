<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage\MasterPage;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage\MasterPageBaseVariationOrOption;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 商品ページ（基本）
 *
 * Class MasterPageTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterPageTest extends TestCase
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
