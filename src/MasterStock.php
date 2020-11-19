<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterStock\MasterStock as MasterStockBase;

/**
 * 在庫マスタ
 *
 * Trait MasterStock
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterStock
{
    /**
     * メールタグ検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterStockSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterStockBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterStockBase::$endpoint_search, $params);
        return new ApiResultEntity($response, MasterStockBase::class);
    }

    /**
     * メールタグ件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterStockCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterStockBase::$endpoint_count, $params);
        return new ApiResultEntity($response, MasterStockBase::class);
    }
}
