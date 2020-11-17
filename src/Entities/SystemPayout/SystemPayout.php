<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemPayout;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 支払方法区分情報
 *
 * Class SystemPayout
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemPayout
 *
 * @property string pay_out_id 支払方法区分
 * @property string pay_out_name 支払方法名
 */
class SystemPayout extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_payout/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'pay_out_id',
        'pay_out_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
