<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemTax;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 税区分情報
 *
 * Class SystemTax
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemTax
 *
 * @property string tax_id 税区分
 * @property string tax_name 税名
 */
class SystemTax extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_tax/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'tax_id',
        'tax_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
