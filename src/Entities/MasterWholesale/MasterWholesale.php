<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterWholesale;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 卸先マスタ
 *
 * Class MasterWholesale
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterWholesale
 *
 * @property string wholesale_id 卸先コード
 * @property string wholesale_name 卸先名
 * @property string wholesale_kana 卸先カナ
 * @property string wholesale_post_name 部署名
 * @property string wholesale_zip_code 郵便番号
 * @property string wholesale_address1 住所1
 * @property string wholesale_address2 住所2
 * @property string wholesale_phone 電話番号
 * @property string wholesale_fax FAX番号
 * @property string wholesale_mail_address メールアドレス
 * @property string wholesale_destination_pic_name 送付先名
 * @property string wholesale_destination_pic_kana 送付先カナ
 * @property string wholesale_destination_zip_code 送付先郵便番号
 * @property string wholesale_destination_address1 送付先住所1
 * @property string wholesale_destination_address2 送付先住所2
 * @property string wholesale_destination_phone 送付先電話番号
 * @property string wholesale_delivery_id 発送方法区分
 * @property string wholesale_delivery_name 発送方法名
 * @property string wholesale_payment_method_id 支払区分
 * @property string wholesale_payment_method_name 支払名
 * @property integer wholesale_retail_ratio 掛率
 * @property integer wholesale_destination_no 卸先番号
 * @property integer wholesale_credit_line_price 与信枠（円）
 * @property integer wholesale_closing_day 締日
 * @property string wholesale_note 備考
 * @property string wholesale_deleted_flag 削除フラグ
 * @property Carbon wholesale_creation_date 作成日
 * @property Carbon wholesale_last_modified_date 最終更新日
 * @property Carbon wholesale_last_modified_null_safe_date 最終更新日
 * @property integer wholesale_creator_id 作成担当者ID
 * @property string wholesale_creator_name 作成担当者名
 * @property integer wholesale_last_modified_by_id 最終更新者ID
 * @property integer wholesale_last_modified_by_null_safe_id 最終更新者ID
 * @property string wholesale_last_modified_by_name 最終更新者名
 * @property string wholesale_last_modified_by_null_safe_name 最終更新者名
 */
class MasterWholesale extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'wholesale_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_wholesale/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_wholesale/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'wholesale_id',
        'wholesale_name',
        'wholesale_kana',
        'wholesale_post_name',
        'wholesale_zip_code',
        'wholesale_address1',
        'wholesale_address2',
        'wholesale_phone',
        'wholesale_fax',
        'wholesale_mail_address',
        'wholesale_destination_pic_name',
        'wholesale_destination_pic_kana',
        'wholesale_destination_zip_code',
        'wholesale_destination_address1',
        'wholesale_destination_address2',
        'wholesale_destination_phone',
        'wholesale_delivery_id',
        'wholesale_delivery_name',
        'wholesale_payment_method_id',
        'wholesale_payment_method_name',
        'wholesale_retail_ratio',
        'wholesale_destination_no',
        'wholesale_credit_line_price',
        'wholesale_closing_day',
        'wholesale_note',
        'wholesale_deleted_flag',
        'wholesale_creation_date',
        'wholesale_last_modified_date',
        'wholesale_last_modified_null_safe_date',
        'wholesale_creator_id',
        'wholesale_creator_name',
        'wholesale_last_modified_by_id',
        'wholesale_last_modified_by_null_safe_id',
        'wholesale_last_modified_by_name',
        'wholesale_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'wholesale_creation_date',
        'wholesale_last_modified_date',
        'wholesale_last_modified_null_safe_date',
    ];
}
