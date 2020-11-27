<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;

/**
 * Class NextEngineTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class NextEngineTest extends TestCase
{
    /**
     * ログインユーザー取得
     */
    public function testLoginUser(): void
    {
        $this->expectException(NextEngineException::class);
        NextEngine::loginUser();
    }

    /**
     * アクセストークン取得
     */
    public function testGetAccessToken(): void
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
     * @return void
     */
    public function testCompany(): void
    {
        $response = NextEngine::setAccount($this->nextEngineApi)->company();
        self::assertArrayHasKey('count', $response);
        self::assertArrayHasKey('data', $response);
        self::assertArrayHasKey('result', $response);
    }
}
