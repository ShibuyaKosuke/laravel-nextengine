<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 発注明細
 *
 * Class PlaceOrderRow
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\PlaceOrder
 *
 * @property integer place_order_row_place_order_id 発注伝票番号
 * @property integer place_order_row_no 発注明細行
 * @property string place_order_row_goods_id 商品コード
 * @property string place_order_row_goods_type_id 商品区分
 * @property string place_order_row_goods_type_name 商品区分名
 * @property string place_order_row_goods_name 商品名
 * @property string place_order_row_goods_option 商品オプション
 * @property integer place_order_row_unit_price 発注単価
 * @property integer place_order_row_place_quantity 発注数
 * @property integer place_order_row_sub_total_price 小計金
 * @property integer place_order_row_receive_order_id 受注伝票番号
 * @property integer place_order_row_receive_order_row_no 受注明細行
 * @property integer place_order_row_supply_quantity 仕入数
 * @property string place_order_row_cancel_flag キャンセルフラグ
 * @property string place_order_row_completed_flag 完了フラグ
 * @property string place_order_row_type_id 発注種別区分
 * @property string place_order_row_type_name 発注種別区分名
 * @property string place_order_row_note 備考
 * @property Carbon place_order_row_delivery_date 予定納期
 * @property Carbon place_order_row_creation_date 作成日
 * @property Carbon place_order_row_last_modified_date 最終更新日
 * @property Carbon place_order_row_last_modified_null_safe_date 最終更新日
 * @property integer place_order_row_creator_id 作成担当者ID
 * @property string place_order_row_creator_name 作成担当者名
 * @property integer place_order_row_last_modified_by_id 最終更新者ID
 * @property integer place_order_row_last_modified_by_null_safe_id 最終更新者ID
 * @property string place_order_row_last_modified_by_name 最終更新者名
 * @property string place_order_row_last_modified_by_null_safe_name 最終更新者名
 */
class PlaceOrderRow extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'place_order_row_place_order_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_placeorder_row/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_placeorder_row/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'place_order_row_place_order_id',
        'place_order_row_no',
        'place_order_row_goods_id',
        'place_order_row_goods_type_id',
        'place_order_row_goods_type_name',
        'place_order_row_goods_name',
        'place_order_row_goods_option',
        'place_order_row_unit_price',
        'place_order_row_place_quantity',
        'place_order_row_sub_total_price',
        'place_order_row_receive_order_id',
        'place_order_row_receive_order_row_no',
        'place_order_row_supply_quantity',
        'place_order_row_cancel_flag',
        'place_order_row_completed_flag',
        'place_order_row_type_id',
        'place_order_row_type_name',
        'place_order_row_note',
        'place_order_row_delivery_date',
        'place_order_row_creation_date',
        'place_order_row_last_modified_date',
        'place_order_row_last_modified_null_safe_date',
        'place_order_row_creator_id',
        'place_order_row_creator_name',
        'place_order_row_last_modified_by_id',
        'place_order_row_last_modified_by_null_safe_id',
        'place_order_row_last_modified_by_name',
        'place_order_row_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'place_order_row_delivery_date',
        'place_order_row_creation_date',
        'place_order_row_last_modified_date',
        'place_order_row_last_modified_null_safe_date',
    ];
}
