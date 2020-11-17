<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemSelect;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 商品選択肢区分情報
 *
 * Class SystemSelect
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemSelect
 *
 * @property string select_id 商品選択肢区分
 * @property string select_value 商品選択肢値
 * @property string select_name 商品選択肢名
 */
class SystemSelect extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_select/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'select_id',
        'select_value',
        'select_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
