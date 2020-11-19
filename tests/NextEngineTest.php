<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * Class NextEngineTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class NextEngineTest extends TestCase
{
    /**
     * @var NextEngine
     */
    private $object;

    /**
     * Setup the test environment.
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
    }

    /**
     * ログインユーザー取得
     */
    public function testLoginUser()
    {
        $this->expectException(NextEngineException::class);
        NextEngine::loginUser();
    }

    /**
     * アクセストークン取得
     */
    public function testGetAccessToken()
    {
        $response = NextEngine::setAccount($this->nextEngineApi)->getAccessToken();

        if (array_key_exists('redirect', $response)) {
            self::assertArrayHasKey('redirect', $response);
            return;
        }

        self::assertArrayHasKey('access_token', $response);
        self::assertArrayHasKey('company_app_header', $response);
        self::assertArrayHasKey('company_ne_id', $response);
        self::assertArrayHasKey('company_name', $response);
        self::assertArrayHasKey('company_kana', $response);
        self::assertArrayHasKey('uid', $response);
        self::assertArrayHasKey('pic_ne_id', $response);
        self::assertArrayHasKey('pic_name', $response);
        self::assertArrayHasKey('pic_kana', $response);
        self::assertArrayHasKey('pic_mail_address', $response);
        self::assertArrayHasKey('refresh_token', $response);
        self::assertArrayHasKey('result', $response);
    }

    /**
     * @throws NextEngineException
     */
    public function testCompany()
    {
        $response = NextEngine::setAccount($this->nextEngineApi)->company();
        self::assertArrayHasKey('count', $response);
        self::assertArrayHasKey('data', $response);
        self::assertArrayHasKey('result', $response);
    }
}
