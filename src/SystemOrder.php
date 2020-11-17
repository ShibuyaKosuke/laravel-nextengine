<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder\SystemOrder as SystemOrderBase;

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
}
