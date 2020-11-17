<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 発送方法区分情報
 *
 * Class SystemDelivery
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery
 */
class SystemDelivery extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_delivery/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'delivery_id',
        'delivery_name',
        'delivery_deleted_flag',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
