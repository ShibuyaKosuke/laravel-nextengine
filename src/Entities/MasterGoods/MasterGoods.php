<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * Class MasterGoods
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterGoods
 *
 * @property string goods_id 商品コード
 * @property string goods_representation_id 代表商品コード
 * @property string goods_name 商品名
 * @property string goods_foreign_name 英語商品名
 * @property string goods_type_id 商品区分
 * @property string goods_type_name 商品区分名
 * @property string goods_merchandise_id 取扱区分
 * @property string goods_merchandise_name 取扱区分名
 * @property string goods_forwarding_method_id 輸送方法指定
 * @property string goods_forwarding_method_name 輸送方法指定名
 * @property string goods_status_id 商品ステータス区分
 * @property string goods_status_name 商品ステータス名
 * @property string goods_delivery_id 発送方法区分
 * @property string goods_delivery_name 発送方法名
 * @property string goods_supplier_id 仕入先コード
 * @property string goods_jan_code JANコード
 * @property string goods_maker_name メーカー名
 * @property string goods_maker_kana メーカーカナ
 * @property string goods_maker_address メーカー住所
 * @property string goods_maker_zip_code メーカー郵便番号
 * @property string goods_model_number 型番
 * @property string goods_color 色
 * @property string goods_mall_category モールカテゴリ
 * @property string goods_shop_category 店舗カテゴリ
 * @property integer goods_cost_price 原価
 * @property integer goods_display_price 定価
 * @property integer goods_selling_price 売価単価
 * @property integer goods_foreign_selling_price 外国売価単価
 * @property integer goods_tax_rate 消費税率（%）
 * @property integer goods_wholesale_retail_ratio 掛率
 * @property integer goods_weight 重さ
 * @property integer goods_width 幅
 * @property integer goods_length 奥行き
 * @property integer goods_height 高さ
 * @property Carbon goods_release_date 発売日
 * @property Carbon goods_first_time_sold_date 初販売日
 * @property Carbon goods_last_time_sold_date 最終販売日
 * @property Carbon goods_first_time_supplied_date 初仕入れ日
 * @property Carbon goods_last_time_supplied_date 最終仕入れ日
 * @property integer goods_stock_constant 在庫定数
 * @property integer goods_order_point 発注点
 * @property integer goods_lot ロット
 * @property Carbon goods_publication_date 掲載日
 * @property string goods_stock_management_flag 在庫管理フラグ
 * @property string goods_note 備考
 * @property string goods_visible_flag 表示フラグ
 * @property string goods_tag 商品分類タグ
 * @property string goods_location ロケーション
 * @property integer goods_delivery_mail_flag メール送信フラグ
 * @property string goods_delivery_mail_maximum_quality メール送信数
 * @property integer goods_gift_ok_flg ギフト可フラグ
 * @property string goods_size サイズ
 * @property string goods_maker_model_number メーカー型番
 * @property integer goods_stock_alert_mail_threshold 在庫アラートメール閾値
 * @property integer goods_wholesale_mortgage_threshold 卸引当用敷居値
 * @property string goods_shipping_base_id 発送元コード
 * @property string goods_mail_tag_id メールタグ
 * @property string goods_1_item 項目１
 * @property string goods_2_item 項目２
 * @property string goods_3_item 項目３
 * @property string goods_4_item 項目４
 * @property string goods_5_item 項目５
 * @property string goods_6_item 項目６
 * @property string goods_7_item 項目７
 * @property string goods_8_item 項目８
 * @property string goods_9_item 項目９
 * @property string goods_10_item 項目１０
 * @property string goods_11_item 項目１１
 * @property string goods_12_item 項目１２
 * @property string goods_13_item 項目１３
 * @property string goods_14_item 項目１４
 * @property string goods_15_item 項目１５
 * @property string goods_16_item 項目１６
 * @property string goods_17_item 項目１７
 * @property string goods_18_item 項目１８
 * @property string goods_19_item 項目１９
 * @property string goods_20_item 項目２０
 * @property integer goods_1_select_id 選択肢ID１
 * @property string goods_1_select_name 選択肢名１
 * @property integer goods_2_select_id 選択肢ID２
 * @property string goods_2_select_name 選択肢名２
 * @property integer goods_3_select_id 選択肢ID３
 * @property string goods_3_select_name 選択肢名３
 * @property integer goods_4_select_id 選択肢ID４
 * @property string goods_4_select_name 選択肢名４
 * @property integer goods_5_select_id 選択肢ID５
 * @property string goods_5_select_name 選択肢名５
 * @property integer goods_6_select_id 選択肢ID６
 * @property string goods_6_select_name 選択肢名６
 * @property integer goods_7_select_id 選択肢ID７
 * @property string goods_7_select_name 選択肢名７
 * @property integer goods_8_select_id 選択肢ID８
 * @property string goods_8_select_name 選択肢名８
 * @property integer goods_9_select_id 選択肢ID９
 * @property string goods_9_select_name 選択肢名９
 * @property integer goods_10_select_id 選択肢ID１０
 * @property string goods_10_select_name 選択肢名１０
 * @property integer goods_publication_pic_id 掲載担当者ID
 * @property string goods_publication_pic_name 掲載担当者名
 * @property integer goods_stock_wholesale_quantity 卸在庫数
 * @property string goods_description_text 商品説明（テキスト）
 * @property string goods_description_html 商品説明（HTML）
 * @property string goods_spec_text スペック（テキスト）
 * @property string goods_spec_html スペック（HTML）
 * @property string goods_caution_text 注意事項（テキスト）
 * @property string goods_caution_html 注意事項（HTML）
 * @property string goods_condition_description 商品状態説明
 * @property string goods_condition_id 商品状態ID
 * @property integer goods_hit_syohin_alert_quantity ヒット商品お知らせ個数
 * @property string goods_delivery_date_id 納期ID
 * @property string goods_designated_delivery_date 納期指定日
 * @property Carbon goods_creation_date 作成日
 * @property Carbon goods_last_modified_date 最終更新日
 * @property Carbon goods_last_modified_null_safe_date 最終更新日
 * @property integer goods_creator_id 作成担当者ID
 * @property string goods_creator_name 作成担当者名
 * @property integer goods_last_modified_by_id 最終更新者ID
 * @property integer goods_last_modified_by_null_safe_id 最終更新者ID
 * @property string goods_last_modified_by_name 最終更新者名
 * @property string goods_last_modified_by_null_safe_name 最終更新者名
 */
class MasterGoods extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'goods_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_goods/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_goods/count';

    /**
     * @var string アップロードエンドポイント
     */
    public static $endpoint_upload = '/api_v1_master_goods/upload';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'goods_id',
        'goods_representation_id',
        'goods_name',
        'goods_foreign_name',
        'goods_type_id',
        'goods_type_name',
        'goods_merchandise_id',
        'goods_merchandise_name',
        'goods_forwarding_method_id',
        'goods_forwarding_method_name',
        'goods_status_id',
        'goods_status_name',
        'goods_delivery_id',
        'goods_delivery_name',
        'goods_supplier_id',
        'goods_jan_code',
        'goods_maker_name',
        'goods_maker_kana',
        'goods_maker_address',
        'goods_maker_zip_code',
        'goods_model_number',
        'goods_color',
        'goods_mall_category',
        'goods_shop_category',
        'goods_cost_price',
        'goods_display_price',
        'goods_selling_price',
        'goods_foreign_selling_price',
        'goods_tax_rate',
        'goods_wholesale_retail_ratio',
        'goods_weight',
        'goods_width',
        'goods_length',
        'goods_height',
        'goods_release_date',
        'goods_first_time_sold_date',
        'goods_last_time_sold_date',
        'goods_first_time_supplied_date',
        'goods_last_time_supplied_date',
        'goods_stock_constant',
        'goods_order_point',
        'goods_lot',
        'goods_publication_date',
        'goods_stock_management_flag',
        'goods_note',
        'goods_visible_flag',
        'goods_tag',
        'goods_location',
        'goods_delivery_mail_flag',
        'goods_delivery_mail_maximum_quality',
        'goods_gift_ok_flg',
        'goods_size',
        'goods_maker_model_number',
        'goods_stock_alert_mail_threshold',
        'goods_wholesale_mortgage_threshold',
        'goods_shipping_base_id',
        'goods_mail_tag_id',
        'goods_1_item',
        'goods_2_item',
        'goods_3_item',
        'goods_4_item',
        'goods_5_item',
        'goods_6_item',
        'goods_7_item',
        'goods_8_item',
        'goods_9_item',
        'goods_10_item',
        'goods_11_item',
        'goods_12_item',
        'goods_13_item',
        'goods_14_item',
        'goods_15_item',
        'goods_16_item',
        'goods_17_item',
        'goods_18_item',
        'goods_19_item',
        'goods_20_item',
        'goods_1_select_id',
        'goods_1_select_name',
        'goods_2_select_id',
        'goods_2_select_name',
        'goods_3_select_id',
        'goods_3_select_name',
        'goods_4_select_id',
        'goods_4_select_name',
        'goods_5_select_id',
        'goods_5_select_name',
        'goods_6_select_id',
        'goods_6_select_name',
        'goods_7_select_id',
        'goods_7_select_name',
        'goods_8_select_id',
        'goods_8_select_name',
        'goods_9_select_id',
        'goods_9_select_name',
        'goods_10_select_id',
        'goods_10_select_name',
        'goods_publication_pic_id',
        'goods_publication_pic_name',
        'goods_stock_wholesale_quantity',
        'goods_description_text',
        'goods_description_html',
        'goods_spec_text',
        'goods_spec_html',
        'goods_caution_text',
        'goods_caution_html',
        'goods_condition_description',
        'goods_condition_id',
        'goods_hit_syohin_alert_quantity',
        'goods_delivery_date_id',
        'goods_designated_delivery_date',
        'goods_creation_date',
        'goods_last_modified_date',
        'goods_last_modified_null_safe_date',
        'goods_creator_id',
        'goods_creator_name',
        'goods_last_modified_by_id',
        'goods_last_modified_by_null_safe_id',
        'goods_last_modified_by_name',
        'goods_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'goods_release_date',
        'goods_first_time_sold_date',
        'goods_last_time_sold_date',
        'goods_first_time_supplied_date',
        'goods_last_time_supplied_date',
        'goods_publication_date',
        'goods_creation_date',
        'goods_last_modified_date',
        'goods_last_modified_null_safe_date',
    ];
}
