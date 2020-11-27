<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemImportant\SystemImportantCheck;

/**
 * 重要チェック区分情報
 *
 * Class SystemImportantTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemImportantTest extends TestCase
{
    /**
     * 重要チェック区分情報
     */
    public function testSystemImportantCheck()
    {
        $apiResultEntity = $this->object->systemImportantCheck();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemImportantCheck::class, $data);
        }
    }
}
