<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use Illuminate\Support\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderConfirm;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderOption;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderRow;

/**
 * 受注伝票系メソッド
 *
 * Trait ReceiveOrder
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait ReceiveOrder
{
    /**
     * 受注伝票検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderBaseSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderBase::$endpoint_search, $params);
        return new ApiResultEntity(ReceiveOrderBase::setData($response));
    }

    /**
     * 受注伝票件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderBaseCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderBase::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderBase::setData($response));
    }

    /**
     * 受注明細検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderRowSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderRow::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderRow::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderRow::setData($response));
    }

    /**
     * 受注明細件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderRowCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderRow::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderRow::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderRow::setData($response));
    }

    /**
     * 受注オプション検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderOptionSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderOption::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderOption::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderOption::setData($response));
    }

    /**
     * 受注オプション件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderOptionCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderOption::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderOption::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderOption::setData($response));
    }

    /**
     * 受注確認内容検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderConfirmSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderConfirm::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderConfirm::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderConfirm::setData($response));
    }

    /**
     * 受注確認内容件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderConfirmCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderConfirm::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderConfirm::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderConfirm::setData($response));
    }
}
