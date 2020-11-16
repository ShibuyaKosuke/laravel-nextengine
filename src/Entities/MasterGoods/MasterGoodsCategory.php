<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * Class MasterGoodsCategory
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods
 *
 * @property integer goods_category_id 商品カテゴリID
 * @property string goods_category_goods_id 商品コード
 * @property integer goods_category_mall_id モールコード
 * @property integer goods_category_mall_category_id カテゴリ(ID)
 * @property string goods_category_text カテゴリ(テキスト)
 * @property string goods_category_deleted_flag 削除フラグ
 * @property Carbon goods_category_creation_date 作成日
 * @property Carbon goods_category_last_modified_date 最終更新日
 * @property Carbon goods_category_last_modified_null_safe_date 最終更新日
 * @property integer goods_category_creator_id 作成担当者ID
 * @property string goods_category_creator_name 作成担当者名
 * @property integer goods_category_last_modified_by_id 最終更新者ID
 * @property integer goods_category_last_modified_by_null_safe_id 最終更新者ID
 * @property string goods_category_last_modified_by_name 最終更新者名
 * @property string goods_category_last_modified_by_null_safe_name 最終更新者名
 */
class MasterGoodsCategory extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'goods_category_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_goodscategory/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_goodscategory/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'goods_category_id',
        'goods_category_goods_id',
        'goods_category_mall_id',
        'goods_category_mall_category_id',
        'goods_category_text',
        'goods_category_deleted_flag',
        'goods_category_creation_date',
        'goods_category_last_modified_date',
        'goods_category_last_modified_null_safe_date',
        'goods_category_creator_id',
        'goods_category_creator_name',
        'goods_category_last_modified_by_id',
        'goods_category_last_modified_by_null_safe_id',
        'goods_category_last_modified_by_name',
        'goods_category_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'goods_category_creation_date',
        'goods_category_last_modified_date',
        'goods_category_last_modified_null_safe_date',
    ];
}