<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemItem;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 項目名情報
 *
 * Class SystemItem
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemItem
 *
 * @property string item_id 項目ID
 * @property string item_name 項目名
 */
class SystemItem extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_itemname/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'item_id',
        'item_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
