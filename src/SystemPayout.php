<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemPayout\SystemPayout as SystemPayoutBase;

/**
 * 支払方法区分情報
 *
 * Trait SystemPayout
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemPayout
{
    /**
     * 支払方法区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemPayout(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemPayoutBase::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemPayoutBase::class);
    }
}
