<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit\SystemCreditApprovalType;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit\SystemCreditAuthorizationCenter;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit\SystemCreditType;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * クレジット種類区分情報
 *
 * Class SystemCreditTypeTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemCreditTest extends TestCase
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
     * クレジット種類区分情報
     */
    public function testSystemCreditType()
    {
        $apiResultEntity = $this->object->systemCreditType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemCreditType::class, $data);
        }
    }

    /**
     * クレジットオーソリセンター区分情報
     */
    public function testSystemCreditAuthorizationCenter()
    {
        $apiResultEntity = $this->object->systemCreditAuthorizationCenter();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemCreditAuthorizationCenter::class, $data);
        }
    }

    /**
     * クレジット承認区分情報
     */
    public function testSystemCreditApprovalType()
    {
        $apiResultEntity = $this->object->systemCreditApprovalType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemCreditApprovalType::class, $data);
        }
    }
}
