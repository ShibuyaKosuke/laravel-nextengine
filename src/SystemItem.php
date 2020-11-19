<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemItem\SystemItem as SystemItemBase;

/**
 * 項目名情報
 *
 * Trait SystemItem
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemItem
{
    /**
     * 項目名情報
     *
     * @return ApiResultEntity
     */
    public function systemItem(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemItemBase::$endpoint_info, $params);
        return $this->entity->set($response, SystemItemBase::class);
    }
}
