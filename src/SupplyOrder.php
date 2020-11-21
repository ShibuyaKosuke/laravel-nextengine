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
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function supplyOrderSearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? SupplyOrderBase::class);
    }

    /**
     * 仕入伝票件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function supplyOrderCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SupplyOrderBase::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? SupplyOrderBase::class);
    }

    /**
     * 仕入明細検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function supplyOrderRowSearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? SupplyOrderRow::class);
    }

    /**
     * 仕入明細件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function supplyOrderRowCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SupplyOrderRow::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? SupplyOrderRow::class);
    }
}
