<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterMailTag\MasterMailTag;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * Class MasterMailTagTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterMailTagTest extends TestCase
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
    public function testMasterMailTagSearch()
    {
        $apiResultEntity = $this->object->receiveMasterMailTagSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterMailTag::class, $data);
        }
    }

    /**
     * 商品件数
     */
    public function testMasterMailTagCount()
    {
        $apiResultEntity = $this->object->receiveMasterMailTagCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
