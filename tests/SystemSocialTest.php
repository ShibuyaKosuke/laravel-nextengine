<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemSocial\SystemSocialInsurance;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 社会保険区分情報
 *
 * Class SystemSocialTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemSocialTest extends TestCase
{
    /**
     * 社会保険区分情報
     */
    public function testSystemSocialInsurance()
    {
        $apiResultEntity = $this->object->systemSocialInsurance();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemSocialInsurance::class, $data);
        }
    }
}
