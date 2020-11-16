<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Entities\MasterMailTag\MasterMailTag as MasterMailTagBase;

/**
 * メールタグ
 *
 * Trait MasterMailTag
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait MasterMailTag
{
    /**
     * メールタグ検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterMailTagSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterMailTagBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterMailTagBase::$endpoint_search, $params);
        return new ApiResultEntity(MasterMailTagBase::setData($response));
    }

    /**
     * メールタグ件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function masterMailTagCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => MasterMailTagBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterMailTagBase::$endpoint_count, $params);
        return new ApiResultEntity(MasterMailTagBase::setData($response));
    }
}
