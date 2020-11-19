<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemConfirm\SystemConfirmCheck;

/**
 * 確認チェック区分情報
 *
 * Trait SystemConfirm
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemConfirm
{
    /**
     * 確認チェック区分情報
     *
     * @return ApiResultEntity
     */
    public function systemConfirmCheck(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemConfirmCheck::$endpoint_info, $params);
        return new ApiResultEntity($response, SystemConfirmCheck::class);
    }
}
