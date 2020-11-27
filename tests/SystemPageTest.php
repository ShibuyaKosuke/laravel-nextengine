<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemPage\SystemPageStatus;

/**
 * ページステータス区分情報
 *
 * Class SystemPageTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemPageTest extends TestCase
{
    /**
     * ページステータス区分情報
     */
    public function testSystemPageStatus()
    {
        $apiResultEntity = $this->object->systemPageStatus();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemPageStatus::class, $data);
        }
    }
}
