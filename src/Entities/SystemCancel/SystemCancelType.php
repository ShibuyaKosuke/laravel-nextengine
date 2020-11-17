<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemCancel;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 受注キャンセル区分情報
 *
 * Class SystemCancelType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemCancel
 *
 * @property string cancel_type_id 受注キャンセル区分
 * @property string cancel_type_name 受注キャンセル名
 * @property integer cancel_type_deleted_flag 非表示フラグ
 */
class SystemCancelType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_canceltype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'cancel_type_id',
        'cancel_type_name',
        'cancel_type_deleted_flag',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
