<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop\MasterShop as MasterShopBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop\MasterShopMailAddress;

/**
 * 店舗マスタ
 *
 * Trait MasterShop
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterShop
{
    /**
     * 店舗マスタ検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterShopSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterShopBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterShopBase::$endpoint_search, $params);
        return new ApiResultEntity(MasterShopBase::setData($response));
    }

    /**
     * 店舗マスタ件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterShopCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterShopBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterShopBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterShopBase::setData($response));
    }

    /**
     * 店舗マスタ接続確認
     *
     * @param integer $shop_id 店舗ID
     * @return ApiResultEntity
     */
    public function masterShopCheckConnect(int $shop_id): ApiResultEntity
    {
        $params = [
            'shop_id' => $shop_id,
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(MasterShopBase::$endpoint_check_connect, $params);
        return new ApiResultEntity(MasterShopBase::setData($response));
    }

    /**
     * 受注情報取り込み用メールアドレス取得
     *
     * @param int $shop_id
     * @return ApiResultEntity
     */
    public function masterShopMailAddress(int $shop_id): ApiResultEntity
    {
        $params = [
            'shop_id' => $shop_id,
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
        ];

        $response = $this->apiExecute(MasterShopMailAddress::$endpoint_mail_address, $params);
        return new ApiResultEntity(MasterShopMailAddress::setDataRow($response));
    }
}
