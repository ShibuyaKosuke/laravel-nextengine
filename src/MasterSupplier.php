<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterSupplier\MasterSupplier as MasterSupplierBase;

/**
 * 仕入先マスタ
 *
 * Trait MasterSupplier
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterSupplier
{
    /**
     * 仕入先マスタ検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterSupplierSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterSupplierBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterSupplierBase::$endpoint_search, $params);
        return new ApiResultEntity(MasterSupplierBase::setData($response));
    }

    /**
     * 仕入先マスタ件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterSupplierCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterSupplierBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterSupplierBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterSupplierBase::setData($response));
    }
}
