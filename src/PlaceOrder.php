<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder\PlaceOrderBase;

/**
 * 発注伝票
 *
 * Trait PlaceOrder
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait PlaceOrder
{
    /**
     * 発注伝票検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receivePlaceOrderBaseSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => PlaceOrderBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(PlaceOrderBase::$endpoint_search, $params);
        return new ApiResultEntity(PlaceOrderBase::setData($response));
    }

    /**
     * 発注伝票件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receivePlaceOrderBaseCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => PlaceOrderBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(PlaceOrderBase::$endpoint_count, $params);
        return new ApiResultEntity(PlaceOrderBase::setData($response));
    }
}
