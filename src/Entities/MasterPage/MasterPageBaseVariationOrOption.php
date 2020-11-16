<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 商品ページ（基本-項目選択肢又はオプション）
 *
 * Class MasterPageBaseVariationOrOption
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage
 *
 * @property string page_base_v_o_goods_id 代表商品コード
 * @property string page_base_v_o_option_category オプション 項目名
 * @property string page_base_v_o_option_name オプション 選択肢
 * @property string page_base_v_o_horizontal_value 項目選択肢 横軸選択肢番号
 * @property string page_base_v_o_vertical_value 項目選択肢 縦軸選択肢番号
 * @property string page_base_v_o_horizontal_name 項目選択肢 横軸選択肢
 * @property string page_base_v_o_vertical_name 項目選択肢 縦軸選択肢
 * @property string page_base_v_o_type 種類
 * @property integer page_base_v_o_display_order 表示順
 * @property string page_base_v_o_deleted_flag 削除フラグ
 * @property Carbon page_base_v_o_creation_date 作成日
 * @property Carbon page_base_v_o_last_modified_date 最終更新日
 * @property Carbon page_base_v_o_last_modified_null_safe_date 最終更新日
 * @property integer page_base_v_o_creator_id 作成担当者ID
 * @property string page_base_v_o_creator_name 作成担当者名
 * @property integer page_base_v_o_last_modified_by_id 最終更新者ID
 * @property integer page_base_v_o_last_modified_by_null_safe_id 最終更新者ID
 * @property string page_base_v_o_last_modified_by_name 最終更新者名
 * @property string page_base_v_o_last_modified_by_null_safe_name 最終更新者名
 */
class MasterPageBaseVariationOrOption extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'page_base_v_o_goods_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_pagebasevariationoroption/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_pagebasevariationoroption/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'page_base_v_o_goods_id',
        'page_base_v_o_option_category',
        'page_base_v_o_option_name',
        'page_base_v_o_horizontal_value',
        'page_base_v_o_vertical_value',
        'page_base_v_o_horizontal_name',
        'page_base_v_o_vertical_name',
        'page_base_v_o_type',
        'page_base_v_o_display_order',
        'page_base_v_o_deleted_flag',
        'page_base_v_o_creation_date',
        'page_base_v_o_last_modified_date',
        'page_base_v_o_last_modified_null_safe_date',
        'page_base_v_o_creator_id',
        'page_base_v_o_creator_name',
        'page_base_v_o_last_modified_by_id',
        'page_base_v_o_last_modified_by_null_safe_id',
        'page_base_v_o_last_modified_by_name',
        'page_base_v_o_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'page_base_v_o_creation_date',
        'page_base_v_o_last_modified_date',
        'page_base_v_o_last_modified_null_safe_date',
    ];
}
