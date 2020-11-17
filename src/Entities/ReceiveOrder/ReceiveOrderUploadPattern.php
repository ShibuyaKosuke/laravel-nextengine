<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 受注一括登録パターン情報
 *
 * Class ReceiveOrderUploadPattern
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder
 *
 * @property integer receive_order_upload_pattern_id 受注一括登録パターンID
 * @property string receive_order_upload_pattern_name 受注一括登録パターン名
 * @property integer receive_order_upload_pattern_format_id 受注一括登録フォーマットパターンID
 * @property integer receive_order_upload_pattern_shop_id 店舗ID
 * @property string receive_order_upload_pattern_deleted_flag 削除フラグ
 * @property Carbon receive_order_upload_pattern_creation_date 作成日
 * @property Carbon receive_order_upload_pattern_last_modified_date 最終更新日
 * @property integer receive_order_upload_pattern_creator_id 作成担当者ID
 * @property string receive_order_upload_pattern_creator_name 作成担当者名
 * @property integer receive_order_upload_pattern_last_modified_by_id 最終更新者ID
 * @property string receive_order_upload_pattern_last_modified_by_name 最終更新者名
 */
class ReceiveOrderUploadPattern extends EntityCommon
{
    /**
     * 更新用キー
     */
    const KEY = 'receiveorder_row';

    /**
     * @var string エンドポイント
     */
    public static $endpoint_info = '/api_v1_receiveorder_uploadpattern/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'receive_order_upload_pattern_id',
        'receive_order_upload_pattern_name',
        'receive_order_upload_pattern_format_id',
        'receive_order_upload_pattern_shop_id',
        'receive_order_upload_pattern_deleted_flag',
        'receive_order_upload_pattern_creation_date',
        'receive_order_upload_pattern_last_modified_date',
        'receive_order_upload_pattern_creator_id',
        'receive_order_upload_pattern_creator_name',
        'receive_order_upload_pattern_last_modified_by_id',
        'receive_order_upload_pattern_last_modified_by_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'receive_order_upload_pattern_creation_date',
        'receive_order_upload_pattern_last_modified_date',
    ];
}
