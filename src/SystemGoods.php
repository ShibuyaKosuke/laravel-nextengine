<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods\SystemGoodsStatus;
use ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods\SystemGoodsType;

/**
 * 商品区分情報
 *
 * Trait SystemGoods
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait SystemGoods
{
    /**
     * 商品区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemGoodsType(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemGoodsType::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemGoodsType::class);
    }

    /**
     * 商品ステータス区分情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function systemGoodsStatus(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(SystemGoodsStatus::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? SystemGoodsStatus::class);
    }
}
