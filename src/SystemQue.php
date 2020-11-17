<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemQue\SystemQue as SystemQueBase;

/**
 * アップロードキュー
 *
 * Trait SystemQue
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemQue
{
    /**
     * アップロードキュー検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function systemQueSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SystemQueBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemQueBase::$endpoint_search, $params);
        return new ApiResultEntity(SystemQueBase::setData($response));
    }

    /**
     * アップロードキュー件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function systemQueCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemQueBase::$endpoint_count, $params);
        return new ApiResultEntity(SystemQueBase::setData($response));
    }
}
