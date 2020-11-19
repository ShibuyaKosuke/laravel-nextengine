<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage\MasterPage as MasterPageBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage\MasterPageBaseVariationOrOption;

/**
 * 商品ページ（基本）
 *
 * Trait MasterPage
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterPage
{
    /**
     * 商品ページ（基本）検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterPageBaseSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterPageBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterPageBase::$endpoint_search, $params);
        return new ApiResultEntity(MasterPageBase::class, $response);
    }

    /**
     * 商品ページ（基本）件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterPageBaseCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterPageBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterPageBase::class, $response);
    }

    /**
     * 商品ページ（基本-項目選択肢又はオプション）検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterPageBaseVariationOrOptionSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterPageBaseVariationOrOption::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterPageBaseVariationOrOption::$endpoint_search, $params);
        return new ApiResultEntity(MasterPageBaseVariationOrOption::class, $response);
    }

    /**
     * 商品ページ（基本-項目選択肢又はオプション）件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterPageBaseVariationOrOptionCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterPageBaseVariationOrOption::$endpoint_count, $params);
        return new ApiResultEntity(MasterPageBaseVariationOrOption::class, $response);
    }
}
