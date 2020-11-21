<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemForwarding\SystemForwardingMethod;

/**
 * 輸送区分情報
 *
 * Trait SystemForwarding
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemForwarding
{
    /**
     * 輸送区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemForwardingMethod(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemForwardingMethod::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemForwardingMethod::class);
    }
}
