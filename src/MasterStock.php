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
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterStockSearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? MasterStockBase::class);
    }

    /**
     * メールタグ件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterStockCount(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? MasterStockBase::class);
    }
}
