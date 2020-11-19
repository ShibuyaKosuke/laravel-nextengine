<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemTax\SystemTax as SystemTaxBase;

/**
 * 税区分情報
 *
 * Trait SystemTax
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemTax
{
    /**
     * 税区分情報
     *
     * @return ApiResultEntity
     */
    public function systemTax(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemTaxBase::$endpoint_info, $params);
        return $this->entity->set($response, SystemTaxBase::class);
    }
}
