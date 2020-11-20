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
 * @property integer goods_image_id 商品画像ID
 * @property string goods_image_goods_id 商品コード
 * @property string goods_image_file_name ファイル名
 * @property string goods_image_url_http 画像URL(HTTP)
 * @property string goods_image_url_https 画像URL(HTTPS)
 * @property integer goods_image_size サイズ
 * @property integer goods_image_width 幅
 * @property integer goods_image_height 高さ
 * @property string goods_image_alt 画像説明
 * @property integer goods_image_convert_flg 自動変換フラグ
 * @property string goods_image_display_order 並び順
 * @property integer goods_image_status ファイル状態
 * @property string goods_image_deleted_flag 削除フラグ
 * @property Carbon goods_image_creation_date 作成日
 * @property Carbon goods_image_last_modified_date 最終更新日
 * @property Carbon goods_image_last_modified_null_safe_date 最終更新日
 * @property integer goods_image_creator_id 作成担当者ID
 * @property string goods_image_creator_name 作成担当者名
 * @property integer goods_image_last_modified_by_id 最終更新者ID
 * @property integer goods_image_last_modified_by_null_safe_id 最終更新者ID
 * @property string goods_image_last_modified_by_name 最終更新者名
 * @property string goods_image_last_modified_by_null_safe_name 最終更新者名
 */
class MasterGoodsImage extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'goods_image_id';

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
        'goods_image_id',
        'goods_image_goods_id',
        'goods_image_file_name',
        'goods_image_url_http',
        'goods_image_url_https',
        'goods_image_size',
        'goods_image_width',
        'goods_image_height',
        'goods_image_alt',
        'goods_image_convert_flg',
        'goods_image_display_order',
        'goods_image_status',
        'goods_image_deleted_flag',
        'goods_image_creation_date',
        'goods_image_last_modified_date',
        'goods_image_last_modified_null_safe_date',
        'goods_image_creator_id',
        'goods_image_creator_name',
        'goods_image_last_modified_by_id',
        'goods_image_last_modified_by_null_safe_id',
        'goods_image_last_modified_by_name',
        'goods_image_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'goods_image_creation_date',
        'goods_image_last_modified_date',
        'goods_image_last_modified_null_safe_date',
    ];
}
