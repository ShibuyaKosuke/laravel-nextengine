<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemAuthorization\SystemAuthorizationType;

/**
 * オーソリ区分情報
 *
 * Trait SystemAuthorization
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemAuthorization
{
    /**
     * オーソリ区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemAuthorizationType(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemAuthorizationType::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemAuthorizationType::class);
    }
}
