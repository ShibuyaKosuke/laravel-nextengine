<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterMailTag\MasterMailTag;

/**
 * Class MasterMailTagTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class MasterMailTagTest extends TestCase
{
    /**
     * 商品検索
     */
    public function testMasterMailTagSearch()
    {
        $apiResultEntity = $this->object->masterMailTagSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(MasterMailTag::class, $data);
        }
    }

    /**
     * 商品件数
     */
    public function testMasterMailTagCount()
    {
        $apiResultEntity = $this->object->masterMailTagCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }
}
