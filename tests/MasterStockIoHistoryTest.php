<?php


namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterStockIoHistory\MasterStockIoHistory;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

class MasterStockIoHistoryTest extends TestCase
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
     * 在庫検索
     */
    public function testMasterStockIoHistorySearch()
    {
        $apiResultEntity = $this->object->receiveMasterStockIoHistorySearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterStockIoHistory::class, $data);
        }
    }

    /**
     * 在庫件数
     */
    public function testMasterStockIoHistoryCount()
    {
        $apiResultEntity = $this->object->receiveMasterStockIoHistoryCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}