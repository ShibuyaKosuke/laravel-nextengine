<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemFraction\SystemFraction as SystemFractionBase;

/**
 * 端数処理区分情報
 *
 * Trait SystemFraction
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemFraction
{
    /**
     * 発送方法区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemFraction(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemFractionBase::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemFractionBase::class);
    }
}
