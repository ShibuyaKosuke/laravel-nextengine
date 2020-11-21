<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemPayment\SystemPaymentMethod;

/**
 * 支払区分情報
 *
 * Trait SystemPayment
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemPayment
{
    /**
     * 支払区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemPaymentMethod(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemPaymentMethod::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemPaymentMethod::class);
    }
}
