<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterStockIoHistory\MasterStockIoHistory as MasterStockIoHistoryBase;

/**
 * 在庫入出庫履歴
 *
 * Trait MasterStockIoHistory
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterStockIoHistory
{
    /**
     * 在庫入出庫履歴検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveMasterStockIoHistorySearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterStockIoHistoryBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterStockIoHistoryBase::$endpoint_search, $params);
        return new ApiResultEntity(MasterStockIoHistoryBase::setData($response));
    }

    /**
     * 在庫入出庫履歴件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveMasterStockIoHistoryCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterStockIoHistoryBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterStockIoHistoryBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterStockIoHistoryBase::setData($response));
    }
}
