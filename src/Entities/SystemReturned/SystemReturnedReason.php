<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemReturned;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 返品事由区分情報
 *
 * Class SystemReturnedReason
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemReturned
 *
 * @property string returned_reason_id 返品事由区分
 * @property string returned_reason_name 返品事由名
 */
class SystemReturnedReason extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_returnedreason/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'returned_reason_id',
        'returned_reason_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
