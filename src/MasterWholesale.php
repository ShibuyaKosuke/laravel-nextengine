<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterWholesale\MasterWholesale as MasterWholesaleBase;

/**
 * 卸先マスタ
 *
 * Trait MasterWholesale
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterWholesale
{
    /**
     * 卸先マスタ検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterWholesaleBaseSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterWholesaleBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterWholesaleBase::$endpoint_search, $params);
        return new ApiResultEntity(MasterWholesaleBase::setData($response));
    }

    /**
     * 卸先マスタ件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterWholesaleBaseCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterWholesaleBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterWholesaleBase::setData($response));
    }
}
