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
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterStockIoHistorySearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? MasterStockIoHistoryBase::class);
    }

    /**
     * 在庫入出庫履歴件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterStockIoHistoryCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterStockIoHistoryBase::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? MasterStockIoHistoryBase::class);
    }
}
