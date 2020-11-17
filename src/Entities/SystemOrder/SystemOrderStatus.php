<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 受注状態区分情報
 *
 * Class SystemOrderStatus
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemOrder
 *
 * @property string order_status_id 受注状態区分
 * @property string order_status_name 受注状態名
 */
class SystemOrderStatus extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_orderstatus/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'order_status_id',
        'order_status_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
