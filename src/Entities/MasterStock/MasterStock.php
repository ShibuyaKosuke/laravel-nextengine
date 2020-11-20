<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterStock;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * Class MasterStock
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterStock
 *
 * @property string stock_goods_id 商品コード
 * @property integer stock_quantity 在庫数
 * @property integer stock_allocation_quantity 引当数
 * @property integer stock_defective_quantity 不良在庫数
 * @property integer stock_remaining_order_quantity 発注残数
 * @property integer stock_out_quantity 欠品数
 * @property integer stock_free_quantity フリー在庫数
 * @property integer stock_advance_order_quantity 予約在庫数
 * @property integer stock_advance_order_allocation_quantity 予約引当数
 * @property integer stock_advance_order_free_quantity 予約フリー在庫数
 * @property string stock_deleted_flag 削除フラグ
 * @property Carbon stock_creation_date 作成日
 * @property Carbon stock_last_modified_date 最終更新日
 * @property Carbon stock_last_modified_null_safe_date 最終更新日
 * @property integer stock_creator_id 作成担当者ID
 * @property string stock_creator_name 作成担当者名
 * @property integer stock_last_modified_by_id 最終更新者ID
 * @property integer stock_last_modified_by_null_safe_id 最終更新者ID
 * @property string stock_last_modified_by_name 最終更新者名
 * @property string stock_last_modified_by_null_safe_name 最終更新者名
 */
class MasterStock extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'stock_goods_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_stock/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_stock/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'stock_goods_id',
        'stock_quantity',
        'stock_allocation_quantity',
        'stock_defective_quantity',
        'stock_remaining_order_quantity',
        'stock_out_quantity',
        'stock_free_quantity',
        'stock_advance_order_quantity',
        'stock_advance_order_allocation_quantity',
        'stock_advance_order_free_quantity',
        'stock_deleted_flag',
        'stock_creation_date',
        'stock_last_modified_date',
        'stock_last_modified_null_safe_date',
        'stock_creator_id',
        'stock_creator_name',
        'stock_last_modified_by_id',
        'stock_last_modified_by_null_safe_id',
        'stock_last_modified_by_name',
        'stock_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'stock_creation_date',
        'stock_last_modified_date',
        'stock_last_modified_null_safe_date',
    ];
}
