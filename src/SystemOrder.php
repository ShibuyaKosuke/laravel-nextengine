<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrder as SystemOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrderCondition;

/**
 * 発注区分情報
 *
 * Trait SystemOrder
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemOrder
{
    /**
     * 発注区分情報
     *
     * @return ApiResultEntity
     */
    public function systemOrder(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemOrderBase::$endpoint_info, $params);
        return new ApiResultEntity(SystemOrderBase::setData($response));
    }

    /**
     * 発注条件区分情報
     *
     * @return ApiResultEntity
     */
    public function systemOrderCondition(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemOrderCondition::$endpoint_info, $params);
        return new ApiResultEntity(SystemOrderCondition::setData($response));
    }
}
