<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterWholesale\MasterWholesale;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 卸先マスタ
 *
 * Class MasterWholesaleTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterWholesaleTest extends TestCase
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
     * 発注伝票検索
     */
    public function testMasterWholesaleBaseSearch()
    {
        $apiResultEntity = $this->object->masterWholesaleBaseSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterWholesale::class, $data);
        }
    }

    /**
     * 発注伝票件数
     */
    public function testMasterWholesaleBaseCount()
    {
        $apiResultEntity = $this->object->masterWholesaleBaseCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
