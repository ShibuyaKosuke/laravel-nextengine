<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemImportant;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 重要チェック区分情報
 *
 * Class SystemImportantCheck
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemImportant
 *
 * @property string important_check_id 重要チェック区分
 * @property string important_check_name 重要チェック名
 */
class SystemImportantCheck extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_importantcheck/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'important_check_id',
        'important_check_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
