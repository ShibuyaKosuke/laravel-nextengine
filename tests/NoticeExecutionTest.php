<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\NoticeExecution\NoticeExecution;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * 実行結果お知らせ
 *
 * Class NoticeExecutionTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class NoticeExecutionTest extends TestCase
{
    /**
     * 実行結果お知らせ検索
     */
    public function testNoticeExecutionSearch()
    {
        $apiResultEntity = $this->object->noticeExecutionSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(NoticeExecution::class, $data);
        }
    }

    /**
     * 実行結果お知らせ件数
     */
    public function testNoticeExecutionCount()
    {
        $apiResultEntity = $this->object->noticeExecutionCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 実行結果お知らせ追加
     */
    public function testNoticeExecutionAdd()
    {
        $noticeExecution = new NoticeExecution(
            [
                'execution_notice_success' => '1',
                'execution_notice_title' => 'お知らせの件名',
                'execution_notice_content' => 'お知らせの内容',
            ]
        );

        $apiResultEntity = $this->object->noticeExecutionAdd($noticeExecution);

        self::assertEquals('success', $apiResultEntity->result);
        self::assertGreaterThanOrEqual(1, $apiResultEntity->execution_notice_id);
    }
}
