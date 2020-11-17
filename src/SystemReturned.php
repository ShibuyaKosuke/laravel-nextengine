<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemReturned\SystemReturnedReason;

/**
 * 返品事由区分情報
 *
 * Trait SystemReturned
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemReturned
{
    /**
     * 発送方法区分情報
     *
     * @return ApiResultEntity
     */
    public function systemReturnedReason(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemReturnedReason::$endpoint_info, $params);
        return new ApiResultEntity(SystemReturnedReason::setData($response));
    }
}
