<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemImport\SystemImportType;

/**
 * 取込種類区分情報
 *
 * Trait SystemImport
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemImport
{
    /**
     * 取込種類区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemImportType(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemImportType::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemImportType::class);
    }
}
