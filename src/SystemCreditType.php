<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCreditType\SystemCreditType as SystemCreditTypeBase;

/**
 * クレジット種類区分情報
 *
 * Trait SystemCreditType
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemCreditType
{
    /**
     * クレジット種類区分情報
     *
     * @return ApiResultEntity
     */
    public function systemCreditType(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemCreditTypeBase::$endpoint_info, $params);
        return new ApiResultEntity(SystemCreditTypeBase::setData($response));
    }
}
