<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoods as MasterGoodsBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsCategory;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsImage;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsImageTag;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsTag;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsWholesale;

/**
 * 商品マスタ
 *
 * Trait MasterGoods
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterGoods
{
    /**
     * 商品検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsSearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterGoodsBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsBase::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsBase::class);
    }

    /**
     * 商品件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsBase::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsBase::class);
    }

    /**
     * 商品マスタアップロード
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsUpload(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'data_type' => 'csv',
                'data' => null,
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsBase::$endpoint_upload, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsBase::class);
    }

    /**
     * 商品検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsTagSearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterGoodsTag::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsTag::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsTag::class);
    }

    /**
     * 商品件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsTagCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsTag::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsTag::class);
    }

    /**
     * 商品画像検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsImageSearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterGoodsImage::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsImage::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsImage::class);
    }

    /**
     * 商品画像件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsImageCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsImage::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsImage::class);
    }

    /**
     * 商品画像タグ検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsImageTagSearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterGoodsImageTag::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsImageTag::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsImageTag::class);
    }

    /**
     * 商品画像タグ件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsImageTagCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsImageTag::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsImageTag::class);
    }

    /**
     * 商品画像タグ検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsCategorySearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterGoodsCategory::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsCategory::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsCategory::class);
    }

    /**
     * 商品画像タグ件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsCategoryCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsCategory::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsCategory::class);
    }

    /**
     * 商品別卸先マスタ検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsWholesaleSearch(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterGoodsWholesale::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsWholesale::$endpoint_search, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsWholesale::class);
    }

    /**
     * 商品別卸先マスタ件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterGoodsWholesaleCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterGoodsWholesale::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? MasterGoodsWholesale::class);
    }
}
