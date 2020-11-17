<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemFraction;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 端数処理区分情報
 *
 * Class SystemFraction
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemFraction
 */
class SystemFraction extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_fraction/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'fraction_id',
        'fraction_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
