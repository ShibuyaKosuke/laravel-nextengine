<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemMerchandise\SystemMerchandise as SystemMerchandiseBase;

/**
 * 取扱区分情報
 *
 * Trait SystemMerchandise
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemMerchandise
{
    /**
     * 取扱区分情報
     *
     * @return ApiResultEntity
     */
    public function systemMerchandise(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemMerchandiseBase::$endpoint_info, $params);
        return new ApiResultEntity(SystemMerchandiseBase::class, $response);
    }
}
