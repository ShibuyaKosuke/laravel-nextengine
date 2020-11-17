<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCancel\SystemCancelType;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemConfirm\SystemConfirmCheck;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 確認チェック区分情報
 *
 * Class SystemConfirmTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemConfirmTest extends TestCase
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
     * 確認チェック区分情報
     */
    public function testSystemConfirmCheck()
    {
        $apiResultEntity = $this->object->systemConfirmCheck();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemConfirmCheck::class, $data);
        }
    }
}
