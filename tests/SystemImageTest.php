<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemImage\SystemImage;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;

/**
 * 画像分類タグ
 *
 * Class SystemImageTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemImageTest extends TestCase
{
    private $object;

    /**
     * @return void
     * @throws \ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException
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
     * 画像分類タグ検索
     */
    public function testSystemImageSearch()
    {
        $apiResultEntity = $this->object->supplyOrderSearch();

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
        $apiResultEntity = $this->object->supplyOrderCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}