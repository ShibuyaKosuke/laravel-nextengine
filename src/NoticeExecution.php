<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\NoticeExecution\NoticeExecution as NoticeExecutionBase;

/**
 * 実行結果お知らせ
 *
 * Trait NoticeExecution
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait NoticeExecution
{
    /**
     * 実行結果お知らせ検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function noticeExecutionSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => NoticeExecutionBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(NoticeExecutionBase::$endpoint_search, $params);
        return $this->entity->set($response, NoticeExecutionBase::class);
    }

    /**
     * 実行結果お知らせ件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function noticeExecutionCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(NoticeExecutionBase::$endpoint_count, $params);
        return $this->entity->set($response, NoticeExecutionBase::class);
    }

    /**
     * 実行結果お知らせ追加
     *
     * @param NoticeExecutionBase $notice_execution
     * @return ApiResultEntity
     */
    public function noticeExecutionAdd(NoticeExecutionBase $notice_execution): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
            'execution_notice_success' => $notice_execution->execution_notice_success,
            'execution_notice_title' => $notice_execution->execution_notice_title,
            'execution_notice_content' => $notice_execution->execution_notice_content
        ];

        $response = $this->apiExecute(NoticeExecutionBase::$endpoint_add, $params);
        return $this->entity->set($response);
    }
}
