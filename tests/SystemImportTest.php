<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemImport\SystemImportType;

/**
 * 取込種類区分情報
 *
 * Class SystemImportTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class SystemImportTest extends TestCase
{
    /**
     * 取込種類区分情報
     */
    public function testSystemImportType()
    {
        $apiResultEntity = $this->object->systemImportType();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(SystemImportType::class, $data);
        }
    }
}
