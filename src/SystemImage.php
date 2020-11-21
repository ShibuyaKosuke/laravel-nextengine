<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemImage\SystemImage as SystemImageBase;

/**
 * 画像分類タグ
 *
 * Trait SystemImage
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemImage
{
    /**
     * 画像分類タグ検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemImageSearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SystemImageBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemImageBase::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? SystemImageBase::class);
    }

    /**
     * 画像分類タグ件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemImageCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemImageBase::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? SystemImageBase::class);
    }
}
