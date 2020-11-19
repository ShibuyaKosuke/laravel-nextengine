<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemIo\SystemIoType;

/**
 * 入出荷区分情報
 *
 * Trait SystemIo
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemIo
{
    /**
     * 入出荷区分情報
     *
     * @return ApiResultEntity
     */
    public function systemIoType(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemIoType::$endpoint_info, $params);
        return new ApiResultEntity(SystemIoType::class, $response);
    }
}
