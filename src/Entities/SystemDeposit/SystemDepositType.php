<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemDeposit;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 入金区分情報
 *
 * Class SystemDepositType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemDelivery
 *
 * @property string deposit_type_id 入金区分
 * @property string deposit_type_name 入金名
 */
class SystemDepositType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_deposittype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'deposit_type_id',
        'deposit_type_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
