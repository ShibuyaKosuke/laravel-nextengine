<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall\SystemMall as SystemMallBase;

/**
 * Class SystemMall
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemMall
{
    /**
     * モール検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function systemMallSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SystemMallBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemMallBase::$endpoint_search, $params);
        return new ApiResultEntity(SystemMallBase::setData($response));
    }

    /**
     * モール件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function systemMallCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemMallBase::$endpoint_count, $params);
        return new ApiResultEntity(SystemMallBase::setData($response));
    }
}