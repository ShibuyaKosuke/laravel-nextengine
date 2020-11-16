<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterStockIoHistory;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 在庫入出庫履歴
 *
 * Class MasterStockIoHistory
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterStockIoHistory
 *
 * @property integer stock_io_history_id 在庫入出庫履歴ID
 * @property integer stock_io_history_shop_id 店舗コード
 * @property string stock_io_history_goods_id 商品コード
 * @property Carbon stock_io_history_date 入出庫日
 * @property integer stock_io_history_before_stock_quantity 更新前在庫数
 * @property integer stock_io_history_after_stock_quantity 更新後在庫数
 * @property integer stock_io_history_before_bad_stock_quantity 更新前不良在庫数
 * @property integer stock_io_history_after_bad_stock_quantity 更新後不良在庫数
 * @property integer stock_io_history_quantity 入出庫数
 * @property integer stock_io_history_cut_form_id 伝票番号
 * @property string stock_io_history_io_flag 入出庫フラグ
 * @property string stock_io_history_io_type_id 入出庫区分
 * @property string stock_io_history_io_type_name 入出庫名
 * @property string stock_io_history_reason 事由
 * @property integer stock_io_history_pic_id 担当者ID
 * @property string stock_io_history_pic_name 担当者名
 * @property string stock_io_history_deleted_flag 削除フラグ
 * @property Carbon stock_io_history_creation_date 作成日
 * @property Carbon stock_io_history_last_modified_date 最終更新日
 * @property Carbon stock_io_history_last_modified_null_safe_date 最終更新日
 * @property integer stock_io_history_creator_id 作成担当者ID
 * @property string stock_io_history_creator_name 作成担当者名
 * @property integer stock_io_history_last_modified_by_id 最終更新者ID
 * @property integer stock_io_history_last_modified_by_null_safe_id 最終更新者ID
 * @property string stock_io_history_last_modified_by_name 最終更新者名
 * @property string stock_io_history_last_modified_by_null_safe_name 最終更新者名
 */
class MasterStockIoHistory extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'stock_io_history_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_stockiohistory/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_stockiohistory/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'stock_io_history_id',
        'stock_io_history_shop_id',
        'stock_io_history_goods_id',
        'stock_io_history_date',
        'stock_io_history_before_stock_quantity',
        'stock_io_history_after_stock_quantity',
        'stock_io_history_before_bad_stock_quantity',
        'stock_io_history_after_bad_stock_quantity',
        'stock_io_history_quantity',
        'stock_io_history_cut_form_id',
        'stock_io_history_io_flag',
        'stock_io_history_io_type_id',
        'stock_io_history_io_type_name',
        'stock_io_history_reason',
        'stock_io_history_pic_id',
        'stock_io_history_pic_name',
        'stock_io_history_deleted_flag',
        'stock_io_history_creation_date',
        'stock_io_history_last_modified_date',
        'stock_io_history_last_modified_null_safe_date',
        'stock_io_history_creator_id',
        'stock_io_history_creator_name',
        'stock_io_history_last_modified_by_id',
        'stock_io_history_last_modified_by_null_safe_id',
        'stock_io_history_last_modified_by_name',
        'stock_io_history_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'stock_io_history_date',
        'stock_io_history_creation_date',
        'stock_io_history_last_modified_date',
        'stock_io_history_last_modified_null_safe_date',
    ];
}
