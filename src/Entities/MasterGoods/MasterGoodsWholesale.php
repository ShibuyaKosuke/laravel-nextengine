<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 商品別卸先マスタ
 *
 * Class MasterGoodsWholesale
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods
 *
 * @property string goods_wholesale_goods_id 商品コード
 * @property string goods_wholesale_wholesale_id 卸先コード
 * @property integer goods_wholesale_wholesale_retail_ratio 商品別卸先掛率
 * @property Carbon goods_wholesale_creation_date 作成日
 * @property Carbon goods_wholesale_last_modified_date 最終更新日
 * @property Carbon goods_wholesale_last_modified_null_safe_date 最終更新日
 * @property integer goods_wholesale_creator_id 作成担当者ID
 * @property string goods_wholesale_creator_name 作成担当者名
 * @property integer goods_wholesale_last_modified_by_id 最終更新者ID
 * @property integer goods_wholesale_last_modified_by_null_safe_id 最終更新者ID
 * @property string goods_wholesale_last_modified_by_name 最終更新者名
 * @property string goods_wholesale_last_modified_by_null_safe_name 最終更新者名
 */
class MasterGoodsWholesale extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'goods_wholesale_goods_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_goodswholesale/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_goodswholesale/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'goods_wholesale_goods_id',
        'goods_wholesale_wholesale_id',
        'goods_wholesale_wholesale_retail_ratio',
        'goods_wholesale_creation_date',
        'goods_wholesale_last_modified_date',
        'goods_wholesale_last_modified_null_safe_date',
        'goods_wholesale_creator_id',
        'goods_wholesale_creator_name',
        'goods_wholesale_last_modified_by_id',
        'goods_wholesale_last_modified_by_null_safe_id',
        'goods_wholesale_last_modified_by_name',
        'goods_wholesale_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'goods_wholesale_creation_date',
        'goods_wholesale_last_modified_date',
        'goods_wholesale_last_modified_null_safe_date',
    ];
}
