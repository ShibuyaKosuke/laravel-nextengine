<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemSelect\SystemSelect as SystemSelectBase;

/**
 * 商品選択肢区分情報
 *
 * Trait SystemSelect
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemSelect
{
    /**
     * 商品選択肢区分情報
     *
     * @return ApiResultEntity
     */
    public function systemSelect(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemSelectBase::$endpoint_info, $params);
        return new ApiResultEntity(SystemSelectBase::setData($response));
    }
}
