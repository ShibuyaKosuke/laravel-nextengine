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

        $this->nextEngineApi->uid = '';
        $this->nextEngineApi->state = '';

        $this->object = NextEngine::setAccount($this->nextEngineApi);
    }

    /**
     * @throws NextEngineException
     */
    public function testGetAccessToken()
    {
        $response = $this->object->login()->getAccessToken();
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
        $this->object->login()->loginUser();
    }

    /**
     * @throws NextEngineException
     */
    public function testCompany()
    {
        $response = $this->object->login()->company();
        self::assertArrayHasKey('count', $response);
        self::assertArrayHasKey('data', $response);
        self::assertArrayHasKey('result', $response);
    }
}
