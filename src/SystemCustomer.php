<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCustomer\SystemCustomerType;

/**
 * 顧客区分情報
 *
 * Trait SystemCustomer
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemCustomer
{
    /**
     * 顧客区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemCustomerType(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemCustomerType::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemCustomerType::class);
    }
}
