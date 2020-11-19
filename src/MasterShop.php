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
        return new ApiResultEntity(MasterShopBase::class, $response);
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
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterShopBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterShopBase::class, $response);
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
        return new ApiResultEntity(MasterShopBase::class, $response);
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
        return new ApiResultEntity(null, MasterShopMailAddress::setDataRow($response));
    }

    /**
     * 店舗マスタ店舗作成
     *
     * @param MasterShopBase $masterShop
     * @param int $test_flag
     * @return ApiResultEntity
     */
    public function masterShopCreate(MasterShopBase $masterShop, int $test_flag = 0): ApiResultEntity
    {
        if ($test_flag) {
            $test_flag = 1;
        } elseif ($this->config->get('app.debug')) {
            $test_flag = 1;
        } else {
            $test_flag = 0;
        }

        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
            'data' => $masterShop->toXmlForCreate(),
            'test_flag' => $test_flag,
        ];

        $response = $this->apiExecute(MasterShopBase::$endpoint_create, $params);
        return new ApiResultEntity(null, $response);
    }

    /**
     * 店舗マスタ店舗更新
     *
     * @param MasterShopBase $masterShop
     * @return ApiResultEntity
     */
    public function masterShopUpdate(MasterShopBase $masterShop): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
            'shop_id' => $masterShop->shop_id,
            'shop_last_modified_date' => $masterShop->shop_last_modified_date->format('Y-m-d H:i:s'),
            'data' => $masterShop->toXmlForUpdate(),
        ];

        $response = $this->apiExecute(MasterShopBase::$endpoint_update, $params);
        return new ApiResultEntity(null, $response);
    }
}
