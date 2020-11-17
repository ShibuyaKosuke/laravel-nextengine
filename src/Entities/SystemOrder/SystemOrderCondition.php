<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 発注条件区分情報
 *
 * Class SystemOrderCondition
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder
 *
 * @property string order_condition_id 発注条件区分
 * @property string order_condition_name 発注条件名
 */
class SystemOrderCondition extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_ordercondition/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'order_condition_id',
        'order_condition_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
