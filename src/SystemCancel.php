<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCancel\SystemCancelType;

/**
 * 受注キャンセル区分情報
 *
 * Trait SystemCancel
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemCancel
{
    /**
     * 受注キャンセル区分情報
     *
     * @return ApiResultEntity
     */
    public function systemCancelType(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemCancelType::$endpoint_info, $params);
        return $this->entity->set($response, SystemCancelType::class);
    }
}
