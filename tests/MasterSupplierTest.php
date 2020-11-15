<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterSupplier\MasterSupplier as MasterSupplierBase;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 仕入先マスタ
 *
 * Class MasterSupplier
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterSupplierTest extends TestCase
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
     * 仕入先マスタ検索
     */
    public function testMasterSupplierSearch()
    {
        $apiResultEntity = $this->object->receiveMasterSupplierSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterSupplierBase::class, $data);
        }
    }

    /**
     * 仕入先マスタ件数
     */
    public function testMasterSupplierCount()
    {
        $apiResultEntity = $this->object->receiveMasterSupplierCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
