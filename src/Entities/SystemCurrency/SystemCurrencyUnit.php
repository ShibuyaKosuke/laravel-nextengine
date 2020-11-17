<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemCurrency;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 通貨単位区分情報
 *
 * Class SystemCurrencyType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemCustomer
 *
 * @property string currencyunit_id 通貨単位区分名
 * @property string currencyunit_name 通貨単位名
 */
class SystemCurrencyUnit extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_currencyunit/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'currencyunit_id',
        'currencyunit_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
