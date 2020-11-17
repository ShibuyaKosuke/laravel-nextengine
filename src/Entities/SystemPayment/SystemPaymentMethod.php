<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemPayment;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 支払区分情報
 *
 * Class SystemPaymentMethod
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemReturned
 *
 * @property string payment_method_id 支払区分
 * @property string payment_method_name 支払名
 * @property integer payment_method_deleted_flag 非表示フラグ
 */
class SystemPaymentMethod extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_paymentmethod/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'payment_method_id',
        'payment_method_name',
        'payment_method_deleted_flag',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
