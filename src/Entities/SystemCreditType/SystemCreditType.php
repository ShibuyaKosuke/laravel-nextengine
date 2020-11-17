<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemCreditType;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * クレジット種類区分情報
 *
 * Class SystemCreditType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemCreditType
 *
 * @property string credit_type_id クレジット種類区分
 * @property string credit_type_name クレジット名
 */
class SystemCreditType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_credittype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = ['credit_type_id',
        'credit_type_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
