<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder\SupplyOrder as SupplyOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder\SupplyOrderRow;

/**
 * 仕入伝票
 *
 * Trait SupplyOrder
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SupplyOrder
{
    /**
     * 仕入伝票検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveSupplyOrderSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SupplyOrderBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SupplyOrderBase::$endpoint_search, $params);
        return new ApiResultEntity(SupplyOrderBase::setData($response));
    }

    /**
     * 仕入伝票件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveSupplyOrderCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SupplyOrderBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SupplyOrderBase::$endpoint_count, $params);
        return new ApiResultEntity(SupplyOrderBase::setData($response));
    }

    /**
     * 仕入明細検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveSupplyOrderRowSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SupplyOrderRow::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SupplyOrderRow::$endpoint_search, $params);
        return new ApiResultEntity(SupplyOrderRow::setData($response));
    }

    /**
     * 仕入明細件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveSupplyOrderRowCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SupplyOrderRow::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SupplyOrderRow::$endpoint_count, $params);
        return new ApiResultEntity(SupplyOrderRow::setData($response));
    }
}
