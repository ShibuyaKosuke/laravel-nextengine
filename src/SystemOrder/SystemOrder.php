<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 発注区分情報
 *
 * Class SystemOrder
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder
 *
 * @property string order_id 発注区分
 * @property string order_name 発注名
 */
class SystemOrder extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_order/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'order_id',
        'order_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
