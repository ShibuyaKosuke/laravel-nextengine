<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery\SystemDelivery as SystemDeliveryBase;

/**
 * 発送方法区分情報
 *
 * Trait SystemDelivery
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemDelivery
{
    /**
     * 発送方法区分情報
     *
     * @return ApiResultEntity
     */
    public function systemDelivery(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemDeliveryBase::$endpoint_info, $params);
        return new ApiResultEntity(SystemDeliveryBase::setData($response));
    }
}
