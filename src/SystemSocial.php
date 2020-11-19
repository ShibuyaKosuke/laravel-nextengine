<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemSocial\SystemSocialInsurance;

/**
 * 社会保険区分情報
 *
 * Trait SystemSocial
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemSocial
{
    /**
     * 社会保険区分情報
     *
     * @return ApiResultEntity
     */
    public function systemSocialInsurance(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemSocialInsurance::$endpoint_info, $params);
        return $this->entity->set($response, SystemSocialInsurance::class);
    }
}
