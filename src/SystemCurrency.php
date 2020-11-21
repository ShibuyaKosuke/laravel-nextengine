<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemCurrency\SystemCurrencyUnit;

/**
 * 通貨単位区分情報
 *
 * Trait SystemCurrency
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemCurrency
{
    /**
     * 通貨単位区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemCurrencyUnit(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemCurrencyUnit::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemCurrencyUnit::class);
    }
}
