<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 発注伝票
 *
 * Class PlaceOrderBase
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder
 *
 * @property integer place_order_id 発注伝票番号
 * @property Carbon place_order_date 発注日
 * @property string place_order_supplier_id 仕入コード
 * @property integer place_order_total_amount 発注合計金
 * @property string place_order_note 備考
 * @property string place_order_status_id 発注伝票区分
 * @property string place_order_status_name 発注伝票区分名
 * @property integer place_order_condition_quantity 数量条件
 * @property integer place_order_condition_money 金額条件
 * @property string place_order_condition_id 発注条件区分
 * @property string place_order_condition_name 発注条件区分名
 * @property string place_order_cancel_flag キャンセルフラグ
 * @property Carbon place_order_creation_date 作成日
 * @property integer place_order_creator_id 作成担当者ID
 * @property string place_order_creator_name 作成担当者名
 * @property Carbon place_order_last_modified_date 最終更新日
 * @property Carbon place_order_last_modified_null_safe_date 最終更新日
 * @property integer place_order_last_modified_by_id 最終更新者ID
 * @property integer place_order_last_modified_by_null_safe_id 最終更新者ID
 * @property string place_order_last_modified_by_name 最終更新者名
 * @property string place_order_last_modified_by_null_safe_name 最終更新者名
 */
class PlaceOrderBase extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'place_order_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_placeorder_base/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_placeorder_base/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'place_order_id',
        'place_order_date',
        'place_order_supplier_id',
        'place_order_total_amount',
        'place_order_note',
        'place_order_status_id',
        'place_order_status_name',
        'place_order_condition_quantity',
        'place_order_condition_money',
        'place_order_condition_id',
        'place_order_condition_name',
        'place_order_cancel_flag',
        'place_order_creation_date',
        'place_order_creator_id',
        'place_order_creator_name',
        'place_order_last_modified_date',
        'place_order_last_modified_null_safe_date',
        'place_order_last_modified_by_id',
        'place_order_last_modified_by_null_safe_id',
        'place_order_last_modified_by_name',
        'place_order_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'place_order_date',
        'place_order_creation_date',
        'place_order_last_modified_date',
        'place_order_last_modified_null_safe_date',
    ];
}
