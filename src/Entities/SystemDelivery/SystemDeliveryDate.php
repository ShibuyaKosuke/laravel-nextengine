<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 納期情報
 *
 * Class SystemDelivery
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery
 *
 * @property string delivery_date_id 納期ID
 * @property string delivery_date_name 納期名
 * @property string delivery_date_days 納期日数
 * @property string delivery_date_note 備考
 */
class SystemDeliveryDate extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_deliverydate/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'delivery_date_id',
        'delivery_date_name',
        'delivery_date_days',
        'delivery_date_note',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
