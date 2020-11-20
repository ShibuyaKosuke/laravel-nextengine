<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 仕入伝票
 *
 * Class SupplyOrder
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SupplyOrder
 *
 * @property integer supply_order_id 仕入伝票番号
 * @property string supply_order_supplier_id 仕入コード
 * @property integer supply_order_type_id 仕入伝票区分
 * @property string supply_order_type_name 仕入伝票区分名
 * @property Carbon supply_order_date 仕入日
 * @property string supply_order_delivery_id 納品書番号
 * @property integer supply_order_correspond_order_id 該当発注伝票番号
 * @property integer supply_order_original_order_id 仕入元伝票番号
 * @property integer supply_order_amount 仕入金
 * @property string supply_order_status_id 仕入状態区分
 * @property string supply_order_status_name 仕入状態区分名
 * @property string supply_order_deleted_flag 削除フラグ
 * @property Carbon supply_order_creation_date 作成日
 * @property Carbon supply_order_last_modified_date 最終更新日
 * @property Carbon supply_order_last_modified_null_safe_date 最終更新日
 * @property integer supply_order_creator_id 作成担当者ID
 * @property string supply_order_creator_name 作成担当者名
 * @property integer supply_order_last_modified_by_id 最終更新者ID
 * @property integer supply_order_last_modified_by_null_safe_id 最終更新者ID
 * @property string supply_order_last_modified_by_name 最終更新者名
 * @property string supply_order_last_modified_by_null_safe_name 最終更新者名
 */
class SupplyOrder extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'supply_order_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_supplyorder_base/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_supplyorder_base/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'supply_order_id',
        'supply_order_supplier_id',
        'supply_order_type_id',
        'supply_order_type_name',
        'supply_order_date',
        'supply_order_delivery_id',
        'supply_order_correspond_order_id',
        'supply_order_original_order_id',
        'supply_order_amount',
        'supply_order_status_id',
        'supply_order_status_name',
        'supply_order_deleted_flag',
        'supply_order_creation_date',
        'supply_order_last_modified_date',
        'supply_order_last_modified_null_safe_date',
        'supply_order_creator_id',
        'supply_order_creator_name',
        'supply_order_last_modified_by_id',
        'supply_order_last_modified_by_null_safe_id',
        'supply_order_last_modified_by_name',
        'supply_order_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'supply_order_date',
        'supply_order_creation_date',
        'supply_order_last_modified_date',
        'supply_order_last_modified_null_safe_date',
    ];
}
