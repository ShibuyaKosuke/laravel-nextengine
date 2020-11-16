<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 商品画像
 *
 * Class MasterGoodsImage
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods
 *
 * @property integer goods_image_tag_id 商品画像分類タグID
 * @property integer goods_image_tag_goods_image_id 商品画像ID
 * @property string goods_image_tag_image_tag_id 画像分類タグID
 * @property string goods_image_tag_deleted_flag 削除フラグ
 * @property Carbon goods_image_tag_creation_date 作成日
 * @property Carbon goods_image_tag_last_modified_date 最終更新日
 * @property Carbon goods_image_tag_last_modified_null_safe_date 最終更新日
 * @property integer goods_image_tag_creator_id 作成担当者ID
 * @property string goods_image_tag_creator_name 作成担当者名
 * @property integer goods_image_tag_last_modified_by_id 最終更新者ID
 * @property integer goods_image_tag_last_modified_by_null_safe_id 最終更新者ID
 * @property string goods_image_tag_last_modified_by_name 最終更新者名
 * @property string goods_image_tag_last_modified_by_null_safe_name 最終更新者名
 */
class MasterGoodsImageTag extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'goods_image_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_goodsimage/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_goodsimage/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'goods_image_tag_id',
        'goods_image_tag_goods_image_id',
        'goods_image_tag_image_tag_id',
        'goods_image_tag_deleted_flag',
        'goods_image_tag_creation_date',
        'goods_image_tag_last_modified_date',
        'goods_image_tag_last_modified_null_safe_date',
        'goods_image_tag_creator_id',
        'goods_image_tag_creator_name',
        'goods_image_tag_last_modified_by_id',
        'goods_image_tag_last_modified_by_null_safe_id',
        'goods_image_tag_last_modified_by_name',
        'goods_image_tag_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'goods_image_tag_creation_date',
        'goods_image_tag_last_modified_date',
        'goods_image_tag_last_modified_null_safe_date',
    ];
}