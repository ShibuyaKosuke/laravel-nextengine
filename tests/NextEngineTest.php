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
     * @var NextEngineApi
     */
    private $nextEngineApi;

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

        $this->nextEngineApi->uid = '379559016b83bfafda8d9f5c5f2f48a138e4e4e6fd19ee549f787b7dd2fadcab24bac978e6a0b7e63cbb8076ced0ccab8725560ad416ffc08aca936e138f7e7e';
        $this->nextEngineApi->state = 'vdWiXV3IhoZt8jaTGAqSsf14FLyzEC7Q';
    }

    /**
     * @throws NextEngineException
     */
    public function testGetAccessToken()
    {
        $response = NextEngine::setAccount($this->nextEngineApi)->getAccessToken();
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
    public function testLoginUser()
    {
        $this->expectException(NextEngineException::class);
        NextEngine::setAccount(factory(NextEngineApi::class)->make())->loginUser();
    }

    /**
     * @throws NextEngineException
     */
    public function testCompany()
    {
        $response = NextEngine::setAccount(factory(NextEngineApi::class)->make())->company();
        self::assertArrayHasKey('count', $response);
        self::assertArrayHasKey('data', $response);
        self::assertArrayHasKey('result', $response);
    }
}
