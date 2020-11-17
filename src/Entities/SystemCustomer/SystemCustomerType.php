<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemCustomer;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 顧客区分情報
 *
 * Class SystemCustomerType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemCustomer
 */
class SystemCustomerType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_customertype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'customer_type_id',
        'customer_type_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
