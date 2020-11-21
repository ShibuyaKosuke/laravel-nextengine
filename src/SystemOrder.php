<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrder as SystemOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrderCondition;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrderStatus;

/**
 * 発注区分情報
 *
 * Trait SystemOrder
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemOrder
{
    /**
     * 発注区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemOrder(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemOrderBase::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemOrderBase::class);
    }

    /**
     * 発注条件区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemOrderCondition(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemOrderCondition::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemOrderCondition::class);
    }

    /**
     * 受注状態区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemOrderStatus(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemOrderStatus::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemOrderStatus::class);
    }
}
