<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemAuthorization;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * オーソリ区分情報
 *
 * Class SystemAuthorizationType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemAuthorization
 *
 * @property string authorizationtype_id オーソリ区分名
 * @property string authorizationtype_name オーソリ名
 */
class SystemAuthorizationType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_authorizationtype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'authorizationtype_id',
        'authorizationtype_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
