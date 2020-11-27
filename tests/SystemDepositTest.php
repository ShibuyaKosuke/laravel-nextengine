<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemDeposit\SystemDepositType;

/**
 * 入金区分情報
 *
 * Class SystemDepositTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemDepositTest extends TestCase
{
    /**
     * 入金区分情報
     */
    public function testSystemDepositType()
    {
        $apiResultEntity = $this->object->systemDepositType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemDepositType::class, $data);
        }
    }
}
