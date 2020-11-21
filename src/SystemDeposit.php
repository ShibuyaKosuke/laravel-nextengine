<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemDeposit\SystemDepositType;

/**
 * 入金区分情報
 *
 * Trait SystemDeposit
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemDeposit
{
    /**
     * 発送方法区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemDepositType(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemDepositType::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemDepositType::class);
    }
}
