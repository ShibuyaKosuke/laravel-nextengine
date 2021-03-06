<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop;

use Carbon\Carbon;
use DOMDocument;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * Class MasterShop
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop
 *
 * @property integer shop_id 店舗ID
 * @property string shop_name 店舗名
 * @property string shop_kana 店舗名カナ
 * @property string shop_abbreviated_name 店舗略名
 * @property string shop_handling_goods_name 取扱商品名
 * @property Carbon shop_close_date 閉店日
 * @property string shop_note 備考
 * @property integer shop_mall_id モールID
 * @property string shop_authorization_type_id オーソリ区分ID
 * @property string shop_authorization_type_name オーソリ区分名
 * @property string shop_tax_id 税区分ID
 * @property string shop_tax_name 税区分名
 * @property string shop_currency_unit_id 通貨単位区分ID
 * @property string shop_currency_unit_name 通貨単位区分名
 * @property string shop_tax_calculation_sequence_id 税計算順序
 * @property string shop_type_id 後払い.com サイトID
 * @property string shop_deleted_flag 削除フラグ
 * @property Carbon shop_creation_date 作成日
 * @property Carbon shop_last_modified_date 最終更新日
 * @property Carbon shop_last_modified_null_safe_date 最終更新日
 * @property integer shop_creator_id 作成担当者ID
 * @property string shop_creator_name 作成担当者名
 * @property integer shop_last_modified_by_id 最終更新者ID
 * @property integer shop_last_modified_by_null_safe_id 最終更新者ID
 * @property string shop_last_modified_by_name 最終更新者名
 * @property string shop_last_modified_by_null_safe_name 最終更新者名
 */
class MasterShop extends EntityCommon
{
    /**
     * 更新用キー
     */
    public static $primaryKey = 'shop_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_shop/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_shop/count';

    /**
     * @var string 店舗接続確認エンドポイント
     */
    public static $endpoint_check_connect = '/api_v1_master_shop/checkconnect';

    /**
     * @var string 店舗作成エンドポイント
     */
    public static $endpoint_create = '/api_v1_master_shop/create';

    /**
     * @var string 店舗更新エンドポイント
     */
    public static $endpoint_update = '/api_v1_master_shop/update';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'shop_id',
        'shop_name',
        'shop_kana',
        'shop_abbreviated_name',
        'shop_handling_goods_name',
        'shop_close_date',
        'shop_note',
        'shop_mall_id',
        'shop_authorization_type_id',
        'shop_authorization_type_name',
        'shop_tax_id',
        'shop_tax_name',
        'shop_currency_unit_id',
        'shop_currency_unit_name',
        'shop_tax_calculation_sequence_id',
        'shop_type_id',
        'shop_deleted_flag',
        'shop_creation_date',
        'shop_last_modified_date',
        'shop_last_modified_null_safe_date',
        'shop_creator_id',
        'shop_creator_name',
        'shop_last_modified_by_id',
        'shop_last_modified_by_null_safe_id',
        'shop_last_modified_by_name',
        'shop_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'shop_close_date',
        'shop_creation_date',
        'shop_last_modified_date',
        'shop_last_modified_null_safe_date',
    ];

    /**
     * 作成時に指定可能な可能なカラム
     *
     * @var array
     */
    public static $create_columns = [
        'shop_mall_id',
        'shop_name',
        'shop_abbreviated_name',
        'shop_kana',
        'shop_note',
        'shop_handling_goods_name',
        'shop_tax_id',
        'shop_tax_calculation_sequence_id',
        'shop_currency_unit_id',
        'shop_authorization_type_id',
        'mall_login_id1',
        'mall_login_id2',
        'mall_login_id3',
        'mall_password1',
        'mall_password2',
        'mall_password3',
        'default_delivery_id',
        'shop_type_id',
    ];

    /**
     * 更新時に指定可能な可能なカラム
     *
     * @var array
     */
    public static $update_columns = [
        'shop_name',
        'shop_abbreviated_name',
        'shop_kana',
        'shop_note',
        'shop_handling_goods_name',
        'shop_tax_id',
        'shop_tax_calculation_sequence_id',
        'shop_currency_unit_id',
        'shop_authorization_type_id',
        'mall_login_id1',
        'mall_login_id2',
        'mall_login_id3',
        'mall_password1',
        'mall_password2',
        'mall_password3',
        'claim_id_yamato',
        'claim_id_seinou',
        'claim_id_fukuyama',
    ];

    /**
     * 変更をXMLにする
     *
     * @return string
     */
    public function toXmlForCreate()
    {
        $properties = array_filter(
            $this->getDirties(),
            function ($k) {
                return in_array($k, self::$create_columns, true);
            },
            ARRAY_FILTER_USE_KEY
        );

        return $this->toXml($properties);
    }

    /**
     * 変更をXMLにする
     *
     * @return string
     */
    public function toXmlForUpdate()
    {
        $properties = array_filter(
            $this->getDirties(),
            function ($k) {
                return in_array($k, self::$update_columns, true);
            },
            ARRAY_FILTER_USE_KEY
        );

        return $this->toXml($properties);
    }

    /**
     * @param array $properties
     * @return string
     */
    public function toXml(array $properties)
    {
        // DOMオブジェクト作成
        $dom = new DomDocument('1.0');
        $dom->encoding = "UTF-8";

        // 出力XMLを改行
        $dom->formatOutput = true;

        $root = $dom->appendChild(
            $dom->createElement('root')
        );

        // MasterShop
        $shop = $dom->createElement('shop');
        foreach ($properties as $key => $value) {
            $shop->appendChild($dom->createElement($key, $value));
        }
        $root->appendChild($shop);

        return $dom->saveXML();
    }
}
