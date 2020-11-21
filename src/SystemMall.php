<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall\SystemMall as SystemMallBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall\SystemMallCategory;

/**
 * Class SystemMall
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemMall
{
    /**
     * モール検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemMallSearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SystemMallBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemMallBase::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? SystemMallBase::class);
    }

    /**
     * モール件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemMallCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemMallBase::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? SystemMallBase::class);
    }

    /**
     * モールカテゴリ検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemMallCategorySearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => SystemMallCategory::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemMallCategory::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? SystemMallCategory::class);
    }

    /**
     * モールカテゴリ件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemMallCategoryCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(SystemMallCategory::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? SystemMallCategory::class);
    }
}
