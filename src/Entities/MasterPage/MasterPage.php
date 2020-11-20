<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 商品ページ（基本）
 *
 * Class MasterPage
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterPage
 *
 * @property string page_base_goods_id 商品コード/代表商品コード
 * @property string page_base_goods_name 商品名
 * @property string page_base_category1 店舗内カテゴリ1
 * @property string page_base_category2 店舗内カテゴリ2
 * @property string page_base_category3 店舗内カテゴリ3
 * @property string page_base_category4 店舗内カテゴリ4
 * @property string page_base_category5 店舗内カテゴリ5
 * @property string page_base_selling_price 販売価格
 * @property string page_base_display_price 表示価格
 * @property string page_base_postage_type 送料区分
 * @property string page_base_postage_amount 個別送料
 * @property string page_base_tax_type 税区分
 * @property string page_base_display_flag 表示フラグ
 * @property string page_base_catch_phrase1 キャッチコピー1
 * @property string page_base_catch_phrase2 キャッチコピー2
 * @property string page_base_description1 説明文1
 * @property string page_base_description2 説明文2
 * @property string page_base_description3 説明文3
 * @property string page_base_description4 説明文4
 * @property string page_base_description5 説明文5
 * @property string page_base_description6 説明文6
 * @property string page_base_description7 説明文7
 * @property string page_base_description8 説明文8
 * @property string page_base_description9 説明文9
 * @property string page_base_description10 説明文10
 * @property string page_base_keyword キーワード
 * @property string page_base_img1_src 画像1 URL（src）
 * @property string page_base_img1_alt 画像1 説明（alt）
 * @property string page_base_img2_src 画像2 URL（src）
 * @property string page_base_img2_alt 画像2 説明（alt）
 * @property string page_base_img3_src 画像3 URL（src）
 * @property string page_base_img3_alt 画像3 説明（alt）
 * @property string page_base_img4_src 画像4 URL（src）
 * @property string page_base_img4_alt 画像4 説明（alt）
 * @property string page_base_img5_src 画像5 URL（src）
 * @property string page_base_img5_alt 画像5 説明（alt）
 * @property string page_base_img6_src 画像6 URL（src）
 * @property string page_base_img6_alt 画像6 説明（alt）
 * @property string page_base_img7_src 画像7 URL（src）
 * @property string page_base_img7_alt 画像7 説明（alt）
 * @property string page_base_img8_src 画像8 URL（src）
 * @property string page_base_img8_alt 画像8 説明（alt）
 * @property string page_base_img9_src 画像9 URL（src）
 * @property string page_base_img9_alt 画像9 説明（alt）
 * @property string page_base_img10_src 画像10 URL（src）
 * @property string page_base_img10_alt 画像10 説明（alt）
 * @property string page_base_v_horizontal_category 項目選択肢 横軸名
 * @property string page_base_v_vertical_category 項目選択肢 縦軸名
 * @property string page_base_date_of_delivery 納期
 * @property string page_base_shipping_days 発送までの日数
 * @property string page_base_sale_amount セール価格
 * @property string page_base_sale_start セール開始日時
 * @property string page_base_sale_end セール終了日時
 * @property string page_base_related_goods 関連商品
 * @property string page_base_brand_name ブランド名
 * @property string page_base_maker_name メーカー名
 * @property string page_base_model_number 型番
 * @property string page_base_maker_model_number メーカー型番
 * @property string page_base_jan JAN/EAN
 * @property string page_base_goods_spec_text 商品の仕様
 * @property string page_base_length 寸法 長さ
 * @property string page_base_length_unit 寸法 長さ 単位
 * @property string page_base_height 寸法 高さ
 * @property string page_base_height_unit 寸法 高さ 単位
 * @property string page_base_width 寸法 幅
 * @property string page_base_width_unit 寸法 幅 単位
 * @property string page_base_weight 寸法 重量
 * @property string page_base_weight_unit 寸法 重量 単位
 * @property string page_base_color 色
 * @property string page_base_gift ギフト可
 * @property string page_base_raw_materials 原材料
 * @property string page_base_origin_country 原産国
 * @property string page_base_origin_place 産地
 * @property string page_base_preservation_method 保存方法
 * @property string page_base_goods_condition 商品のコンディション
 * @property string page_base_spec1 スペック1
 * @property string page_base_spec2 スペック2
 * @property string page_base_spec3 スペック3
 * @property string page_base_spec4 スペック4
 * @property string page_base_spec5 スペック5
 * @property string page_base_free1 フリーエリア1
 * @property string page_base_free2 フリーエリア2
 * @property string page_base_free3 フリーエリア3
 * @property string page_base_free4 フリーエリア4
 * @property string page_base_free5 フリーエリア5
 * @property string page_base_free6 フリーエリア6
 * @property string page_base_free7 フリーエリア7
 * @property string page_base_free8 フリーエリア8
 * @property string page_base_free9 フリーエリア9
 * @property string page_base_free10 フリーエリア10
 * @property Carbon page_base_publication_date 掲載日
 * @property string page_base_publication_pic_id 掲載担当者ID
 * @property string page_base_publication_pic_name 掲載担当者名
 * @property string page_base_page_status_id 商品ページ掲載ステータスID
 * @property string page_base_page_status_name 商品ページ掲載ステータス名
 * @property string page_base_deleted_flag 削除フラグ
 * @property Carbon page_base_creation_date 作成日
 * @property Carbon page_base_last_modified_date 最終更新日
 * @property Carbon page_base_last_modified_null_safe_date 最終更新日
 * @property integer page_base_creator_id 作成担当者ID
 * @property string page_base_creator_name 作成担当者名
 * @property integer page_base_last_modified_by_id 最終更新者ID
 * @property integer page_base_last_modified_by_null_safe_id 最終更新者ID
 * @property string page_base_last_modified_by_name 最終更新者名
 * @property string page_base_last_modified_by_null_safe_name 最終更新者名
 */
class MasterPage extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'page_base_goods_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_pagebase/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_pagebase/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'page_base_goods_id',
        'page_base_goods_name',
        'page_base_category1',
        'page_base_category2',
        'page_base_category3',
        'page_base_category4',
        'page_base_category5',
        'page_base_selling_price',
        'page_base_display_price',
        'page_base_postage_type',
        'page_base_postage_amount',
        'page_base_tax_type',
        'page_base_display_flag',
        'page_base_catch_phrase1',
        'page_base_catch_phrase2',
        'page_base_description1',
        'page_base_description2',
        'page_base_description3',
        'page_base_description4',
        'page_base_description5',
        'page_base_description6',
        'page_base_description7',
        'page_base_description8',
        'page_base_description9',
        'page_base_description10',
        'page_base_keyword',
        'page_base_img1_src',
        'page_base_img1_alt',
        'page_base_img2_src',
        'page_base_img2_alt',
        'page_base_img3_src',
        'page_base_img3_alt',
        'page_base_img4_src',
        'page_base_img4_alt',
        'page_base_img5_src',
        'page_base_img5_alt',
        'page_base_img6_src',
        'page_base_img6_alt',
        'page_base_img7_src',
        'page_base_img7_alt',
        'page_base_img8_src',
        'page_base_img8_alt',
        'page_base_img9_src',
        'page_base_img9_alt',
        'page_base_img10_src',
        'page_base_img10_alt',
        'page_base_v_horizontal_category',
        'page_base_v_vertical_category',
        'page_base_date_of_delivery',
        'page_base_shipping_days',
        'page_base_sale_amount',
        'page_base_sale_start',
        'page_base_sale_end',
        'page_base_related_goods',
        'page_base_brand_name',
        'page_base_maker_name',
        'page_base_model_number',
        'page_base_maker_model_number',
        'page_base_jan',
        'page_base_goods_spec_text',
        'page_base_length',
        'page_base_length_unit',
        'page_base_height',
        'page_base_height_unit',
        'page_base_width',
        'page_base_width_unit',
        'page_base_weight',
        'page_base_weight_unit',
        'page_base_color',
        'page_base_gift',
        'page_base_raw_materials',
        'page_base_origin_country',
        'page_base_origin_place',
        'page_base_preservation_method',
        'page_base_goods_condition',
        'page_base_spec1',
        'page_base_spec2',
        'page_base_spec3',
        'page_base_spec4',
        'page_base_spec5',
        'page_base_free1',
        'page_base_free2',
        'page_base_free3',
        'page_base_free4',
        'page_base_free5',
        'page_base_free6',
        'page_base_free7',
        'page_base_free8',
        'page_base_free9',
        'page_base_free10',
        'page_base_publication_date',
        'page_base_publication_pic_id',
        'page_base_publication_pic_name',
        'page_base_page_status_id',
        'page_base_page_status_name',
        'page_base_deleted_flag',
        'page_base_creation_date',
        'page_base_last_modified_date',
        'page_base_last_modified_null_safe_date',
        'page_base_creator_id',
        'page_base_creator_name',
        'page_base_last_modified_by_id',
        'page_base_last_modified_by_null_safe_id',
        'page_base_last_modified_by_name',
        'page_base_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'page_base_publication_date',
        'page_base_creation_date',
        'page_base_last_modified_date',
        'page_base_last_modified_null_safe_date',
    ];
}
