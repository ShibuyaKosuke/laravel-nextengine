<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemPage\SystemPageStatus;

/**
 * ページステータス区分情報
 *
 * Trait SystemPage
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemPage
{
    /**
     * ページステータス区分情報
     *
     * @return ApiResultEntity
     */
    public function systemPageStatus(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemPageStatus::$endpoint_info, $params);
        return new ApiResultEntity(SystemPageStatus::class, $response);
    }
}
