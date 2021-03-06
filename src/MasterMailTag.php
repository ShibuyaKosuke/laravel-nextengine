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
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterMailTagSearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? MasterMailTagBase::class);
    }

    /**
     * メールタグ件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function masterMailTagCount(array $params = [], string $userClass = null): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(MasterMailTagBase::$endpoint_count, $params);
        return $this->entity->set($response, $userClass ?? MasterMailTagBase::class);
    }
}
