<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * クレジットオーソリセンター区分情報
 *
 * Class SystemCreditAuthorizationCenter
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit
 *
 * @property string credit_authorization_center_id クレジットオーソリセンター区分
 * @property string credit_authorization_center_name クレジットオーソリセンター名
 */
class SystemCreditAuthorizationCenter extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_creditauthorizationcenter/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'credit_authorization_center_id',
        'credit_authorization_center_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
