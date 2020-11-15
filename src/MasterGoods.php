<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoods as MasterGoodsBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods\MasterGoodsTag;

/**
 * 商品マスター系メソッド
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
     * @return ApiResultEntity
     */
    public function receiveMasterGoodsSearch(array $params = []): ApiResultEntity
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
        return new ApiResultEntity(MasterGoodsBase::setData($response));
    }

    /**
     * 商品件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveMasterGoodsCount(array $params = []): ApiResultEntity
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

        $response = $this->apiExecute(MasterGoodsBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterGoodsBase::setData($response));
    }

    /**
     * 商品マスタアップロード
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveMasterGoodsUpload(array $params = []): ApiResultEntity
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
        return new ApiResultEntity(MasterGoodsBase::setData($response));
    }
    /**
     * 商品検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveMasterGoodsTagSearch(array $params = []): ApiResultEntity
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
        return new ApiResultEntity(MasterGoodsTag::setData($response));
    }

    /**
     * 商品件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveMasterGoodsTagCount(array $params = []): ApiResultEntity
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

        $response = $this->apiExecute(MasterGoodsTag::$endpoint_count, $params);
        return new ApiResultEntity(MasterGoodsTag::setData($response));
    }
}