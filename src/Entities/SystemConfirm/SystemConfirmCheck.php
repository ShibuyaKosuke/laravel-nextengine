<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemConfirm;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 確認チェック区分情報
 *
 * Class SystemConfirmCheck
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemConfirm
 *
 * @property string confirm_check_id 確認チェック区分
 * @property string confirm_check_name 確認チェック名
 */
class SystemConfirmCheck extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_confirmcheck/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'confirm_check_id',
        'confirm_check_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
