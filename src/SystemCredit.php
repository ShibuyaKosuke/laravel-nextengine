<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit\SystemCreditApprovalType;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit\SystemCreditAuthorizationCenter;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit\SystemCreditType;

/**
 * クレジット種類区分情報
 *
 * Trait SystemCredit
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemCredit
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

        $response = $this->apiExecute(SystemCreditType::$endpoint_info, $params);
        return new ApiResultEntity(SystemCreditType::setData($response));
    }

    /**
     * クレジットオーソリセンター区分情報
     *
     * @return ApiResultEntity
     */
    public function systemCreditAuthorizationCenter(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemCreditAuthorizationCenter::$endpoint_info, $params);
        return new ApiResultEntity(SystemCreditAuthorizationCenter::setData($response));
    }

    /**
     * クレジット承認区分情報
     *
     * @return ApiResultEntity
     */
    public function systemCreditApprovalType(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemCreditApprovalType::$endpoint_info, $params);
        return new ApiResultEntity(SystemCreditApprovalType::setData($response));
    }
}
