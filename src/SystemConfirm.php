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
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemConfirmCheck(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemConfirmCheck::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemConfirmCheck::class);
    }
}
