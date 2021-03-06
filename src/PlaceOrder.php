<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder\PlaceOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder\PlaceOrderRow;

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
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function placeOrderBaseSearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? PlaceOrderBase::class);
    }

    /**
     * 発注伝票件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function placeOrderBaseCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(PlaceOrderBase::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? PlaceOrderBase::class);
    }

    /**
     * 発注明細検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function placeOrderRowSearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => PlaceOrderRow::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(PlaceOrderRow::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? PlaceOrderRow::class);
    }

    /**
     * 発注明細件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function placeOrderRowCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(PlaceOrderRow::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? PlaceOrderRow::class);
    }
}
