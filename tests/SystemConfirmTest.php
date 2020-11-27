<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemConfirm\SystemConfirmCheck;

/**
 * 確認チェック区分情報
 *
 * Class SystemConfirmTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemConfirmTest extends TestCase
{
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
