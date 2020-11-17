<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery\SystemDelivery;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery\SystemDeliveryDate;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 発送方法区分情報
 *
 * Class SystemDeliveryTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemDeliveryTest extends TestCase
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
     * 発送方法区分情報
     */
    public function testSystemDelivery()
    {
        $apiResultEntity = $this->object->systemDelivery();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemDelivery::class, $data);
        }
    }

    /**
     * 納期情報
     */
    public function testSystemDeliveryDate()
    {
        $apiResultEntity = $this->object->systemDeliveryDate();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemDeliveryDate::class, $data);
        }
    }
}
