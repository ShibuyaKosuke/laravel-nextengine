<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 仕入明細
 *
 * Class SupplyOrderRow
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder
 *
 * @property integer supply_order_row_supply_order_id 仕入伝票番号
 * @property integer supply_order_row_no 仕入コード
 * @property string supply_order_row_goods_id 商品コード
 * @property string supply_order_row_goods_name 商品名
 * @property string supply_order_row_goods_option 商品オプション
 * @property integer supply_order_row_surplus_quantity 余剰数
 * @property integer supply_order_row_quantity 仕入数
 * @property integer supply_order_row_unit_price 仕入単価
 * @property integer supply_order_row_sub_total_price 小計金
 * @property integer supply_order_row_order_id 発注伝票番号
 * @property integer supply_order_row_order_row_no 発注明細行
 * @property integer supply_order_row_receive_order_id 受注伝票番号
 * @property integer supply_order_row_receive_order_row_no 受注明細行
 * @property string supply_order_row_status 仕入明細行区分
 * @property string supply_order_row_completed_flag 仕入完了状態
 * @property string supply_order_row_note 備考
 * @property string supply_order_row_deleted_flag 削除フラグ
 * @property Carbon supply_order_row_creation_date 作成日
 * @property Carbon supply_order_row_last_modified_date 最終更新日
 * @property Carbon supply_order_row_last_modified_null_safe_date 最終更新日
 * @property integer supply_order_row_creator_id 作成担当者ID
 * @property string supply_order_row_creator_name 作成担当者名
 * @property integer supply_order_row_last_modified_by_id 最終更新者ID
 * @property integer supply_order_row_last_modified_by_null_safe_id 最終更新者ID
 * @property string supply_order_row_last_modified_by_name 最終更新者名
 * @property string supply_order_row_last_modified_by_null_safe_name 最終更新者名
 */
class SupplyOrderRow extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'supply_order_row_supply_order_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_supplyorder_row/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_supplyorder_row/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'supply_order_row_supply_order_id',
        'supply_order_row_no',
        'supply_order_row_goods_id',
        'supply_order_row_goods_name',
        'supply_order_row_goods_option',
        'supply_order_row_surplus_quantity',
        'supply_order_row_quantity',
        'supply_order_row_unit_price',
        'supply_order_row_sub_total_price',
        'supply_order_row_order_id',
        'supply_order_row_order_row_no',
        'supply_order_row_receive_order_id',
        'supply_order_row_receive_order_row_no',
        'supply_order_row_status',
        'supply_order_row_completed_flag',
        'supply_order_row_note',
        'supply_order_row_deleted_flag',
        'supply_order_row_creation_date',
        'supply_order_row_last_modified_date',
        'supply_order_row_last_modified_null_safe_date',
        'supply_order_row_creator_id',
        'supply_order_row_creator_name',
        'supply_order_row_last_modified_by_id',
        'supply_order_row_last_modified_by_null_safe_id',
        'supply_order_row_last_modified_by_name',
        'supply_order_row_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'supply_order_row_creation_date',
        'supply_order_row_last_modified_date',
        'supply_order_row_last_modified_null_safe_date',
    ];
}
