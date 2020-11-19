<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterKeepStock\MasterKeepStock as MasterKeepStockBase;

/**
 * 区分け在庫マスタ
 *
 * Trait MasterKeepStock
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterKeepStock
{
    /**
     * 区分け在庫マスタ検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterKeepStockSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterKeepStockBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterKeepStockBase::$endpoint_search, $params);
        return new ApiResultEntity(MasterKeepStockBase::class, $response);
    }

    /**
     * 区分け在庫マスタ件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterKeepStockCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterKeepStockBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterKeepStockBase::class, $response);
    }
}
