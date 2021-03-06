<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemImportant\SystemImportantCheck;

/**
 * 重要チェック区分情報
 *
 * Trait SystemImportant
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemImportant
{
    /**
     * 重要チェック区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemImportantCheck(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemImportantCheck::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemImportantCheck::class);
    }
}
