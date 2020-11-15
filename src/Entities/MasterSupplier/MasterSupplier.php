<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterSupplier;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 仕入先マスタ
 *
 * Class MasterSupplier
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterSupplier
 *
 * @property string supplier_id 仕入先コード
 * @property string supplier_name 仕入先名
 * @property string supplier_kana 仕入先カナ
 * @property string supplier_zip_code 郵便番号
 * @property string supplier_address1 住所１
 * @property string supplier_address2 住所２
 * @property string supplier_tel 電話番号
 * @property string supplier_fax FAX番号
 * @property string supplier_mail_address メールアドレス
 * @property string supplier_post 部署名
 * @property string supplier_pic_name 担当者名
 * @property string supplier_pic_kana 担当者カナ
 * @property string supplier_post_zip_code 部署郵便番号
 * @property string supplier_post_address1 部署住所１
 * @property string supplier_post_address2 部署住所２
 * @property string supplier_post_tel 部署電話番号
 * @property string supplier_post_fax 部署FAX
 * @property string supplier_post_mail_address 部署メールアドレス
 * @property string supplier_order_id 発注区分
 * @property string supplier_order_name 発注名
 * @property integer supplier_condition_quantity 数量条件
 * @property integer supplier_condition_money 金額条件
 * @property string supplier_order_condition_id 発注条件区分
 * @property string supplier_order_condition_name 発注条件名
 * @property string supplier_order_pending_date 発注保留日
 * @property string supplier_pay_out_id 支払方法区分
 * @property string supplier_pay_out_name 支払方法名
 * @property string supplier_closing_day 締日
 * @property string supplier_usance_date 支払サイト日
 * @property string supplier_order_invalid_flag 発注無効フラグ
 * @property Carbon supplier_order_forbid_date 発注禁止日
 * @property string supplier_note 備考
 * @property integer supplier_wholesale_retail_ratio 掛率
 * @property string supplier_deleted_flag 削除フラグ
 * @property Carbon supplier_creation_date 作成日
 * @property Carbon supplier_last_modified_date 最終更新日
 * @property Carbon supplier_last_modified_null_safe_date 最終更新日
 * @property integer supplier_creator_id 作成担当者ID
 * @property string supplier_creator_name 作成担当者名
 * @property integer supplier_last_modified_by_id 最終更新者ID
 * @property integer supplier_last_modified_by_null_safe_id 最終更新者ID
 * @property string supplier_last_modified_by_name 最終更新者名
 * @property string supplier_last_modified_by_null_safe_name 最終更新者名
 */
class MasterSupplier extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'supplier_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_supplier/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_supplier/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'supplier_id',
        'supplier_name',
        'supplier_kana',
        'supplier_zip_code',
        'supplier_address1',
        'supplier_address2',
        'supplier_tel',
        'supplier_fax',
        'supplier_mail_address',
        'supplier_post',
        'supplier_pic_name',
        'supplier_pic_kana',
        'supplier_post_zip_code',
        'supplier_post_address1',
        'supplier_post_address2',
        'supplier_post_tel',
        'supplier_post_fax',
        'supplier_post_mail_address',
        'supplier_order_id',
        'supplier_order_name',
        'supplier_condition_quantity',
        'supplier_condition_money',
        'supplier_order_condition_id',
        'supplier_order_condition_name',
        'supplier_order_pending_date',
        'supplier_pay_out_id',
        'supplier_pay_out_name',
        'supplier_closing_day',
        'supplier_usance_date',
        'supplier_order_invalid_flag',
        'supplier_order_forbid_date',
        'supplier_note',
        'supplier_wholesale_retail_ratio',
        'supplier_deleted_flag',
        'supplier_creation_date',
        'supplier_last_modified_date',
        'supplier_last_modified_null_safe_date',
        'supplier_creator_id',
        'supplier_creator_name',
        'supplier_last_modified_by_id',
        'supplier_last_modified_by_null_safe_id',
        'supplier_last_modified_by_name',
        'supplier_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'supplier_order_forbid_date',
        'supplier_creation_date',
        'supplier_last_modified_date',
        'supplier_last_modified_null_safe_date',
    ];
}
