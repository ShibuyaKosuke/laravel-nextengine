<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 受注確認内容
 *
 * Class ReceiveOrderConfirm
 * @package ShibuyaKosuke\LaravelNextEngine\Entities
 * @property string confirm_id 受注確認内容ID
 * @property string confirm_name 受注確認内容
 * @property integer confirm_display_order 表示順序
 * @property string confirm_html 説明文(HTML)
 * @property string confirm_value 設定値
 * @property integer confirm_valid_flag 有効フラグ
 * @property string confirm_deleted_flag 削除フラグ
 * @property Carbon confirm_creation_date 作成日
 * @property Carbon confirm_last_modified_date 最終更新日
 * @property Carbon confirm_last_modified_null_safe_date 最終更新日
 * @property integer confirm_creator_id 作成担当者ID
 * @property string confirm_creator_name 作成担当者名
 * @property integer confirm_last_modified_by_id 最終更新者ID
 * @property integer confirm_last_modified_by_null_safe_id 最終更新者ID
 * @property string confirm_last_modified_by_name 最終更新者名
 * @property string confirm_last_modified_by_null_safe_name 最終更新者名
 */
class ReceiveOrderConfirm extends EntityCommon
{
    /**
     * 更新用キー
     */
    const KEY = 'confirm_id';

    /**
     * @var string エンドポイント
     */
    public static $endpoint_search = '/api_v1_receiveorder_confirm/search';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_count = '/api_v1_receiveorder_confirm/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'confirm_id',
        'confirm_name',
        'confirm_display_order',
        'confirm_html',
        'confirm_value',
        'confirm_valid_flag',
        'confirm_deleted_flag',
        'confirm_creation_date',
        'confirm_last_modified_date',
        'confirm_last_modified_null_safe_date',
        'confirm_creator_id',
        'confirm_creator_name',
        'confirm_last_modified_by_id',
        'confirm_last_modified_by_null_safe_id',
        'confirm_last_modified_by_name',
        'confirm_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'confirm_creation_date',
        'confirm_last_modified_date',
        'confirm_last_modified_null_safe_date',
    ];
}
