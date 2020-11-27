<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemAuthorization\SystemAuthorizationType;

/**
 * オーソリ区分情報
 *
 * Class SystemAuthorizationTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemAuthorizationTest extends TestCase
{
    /**
     * オーソリ区分情報
     */
    public function testSystemAuthorizationType()
    {
        $apiResultEntity = $this->object->systemAuthorizationType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemAuthorizationType::class, $data);
        }
    }
}
