<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterKeepStock;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 区分け在庫マスタ
 *
 * Class MasterKeepStock
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterKeepStock
 *
 * @property string keep_stock_goods_id 商品コード
 * @property string keep_stock_name 区分け在庫名
 * @property integer keep_stock_quantity 区分け在庫数
 * @property Carbon keep_stock_due_date 期限
 * @property string keep_stock_note 備考
 * @property string keep_stock_deleted_flag 削除フラグ
 * @property Carbon keep_stock_creation_date 作成日
 * @property Carbon keep_stock_last_modified_date 最終更新日
 * @property Carbon keep_stock_last_modified_null_safe_date 最終更新日
 * @property integer keep_stock_creator_id 作成担当者ID
 * @property string keep_stock_creator_name 作成担当者名
 * @property integer keep_stock_last_modified_by_id 最終更新者ID
 * @property integer keep_stock_last_modified_by_null_safe_id 最終更新者ID
 * @property string keep_stock_last_modified_by_name 最終更新者名
 * @property string keep_stock_last_modified_by_null_safe_name 最終更新者名
 */
class MasterKeepStock extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'keep_stock_goods_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_keepstock/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_keepstock/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'keep_stock_goods_id',
        'keep_stock_name',
        'keep_stock_quantity',
        'keep_stock_due_date',
        'keep_stock_note',
        'keep_stock_deleted_flag',
        'keep_stock_creation_date',
        'keep_stock_last_modified_date',
        'keep_stock_last_modified_null_safe_date',
        'keep_stock_creator_id',
        'keep_stock_creator_name',
        'keep_stock_last_modified_by_id',
        'keep_stock_last_modified_by_null_safe_id',
        'keep_stock_last_modified_by_name',
        'keep_stock_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'keep_stock_due_date',
        'keep_stock_creation_date',
        'keep_stock_last_modified_date',
        'keep_stock_last_modified_null_safe_date',
    ];
}
