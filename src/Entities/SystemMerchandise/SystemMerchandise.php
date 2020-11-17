<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemMerchandise;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 取扱区分情報
 *
 * Class SystemMerchandise
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemMerchandise
 *
 * @property string merchandise_id 取扱区分
 * @property string merchandise_name 取扱名
 */
class SystemMerchandise extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_merchandise/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'merchandise_id',
        'merchandise_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
