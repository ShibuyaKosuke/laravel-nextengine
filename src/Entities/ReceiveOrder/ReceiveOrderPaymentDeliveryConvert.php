<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 支払発送変換
 *
 * Class ReceiveOrderPaymentDeliveryConvert
 * @package ShibuyaKosuke\LaravelNextEngine\Entities
 *
 * @property string payment_delivery_convert_text 変換元テキスト
 * @property string payment_delivery_convert_type 項目種類
 * @property string payment_delivery_convert_multi_id 各種ID
 * @property string payment_delivery_convert_delivery_id 発送方法区分
 * @property string payment_delivery_convert_deleted_flag 削除フラグ
 * @property Carbon payment_delivery_convert_creation_date 作成日
 * @property Carbon payment_delivery_convert_last_modified_date 最終更新日
 * @property integer payment_delivery_convert_creator_id 作成担当者ID
 * @property string payment_delivery_convert_creator_name 作成担当者名
 * @property integer payment_delivery_convert_last_modified_by_id 最終更新者ID
 * @property string payment_delivery_convert_last_modified_by_name 最終更新者名
 */
class ReceiveOrderPaymentDeliveryConvert extends EntityCommon
{
    /**
     * 更新用キー
     */
    const KEY = null;

    /**
     * @var string エンドポイント
     */
    public static $endpoint_search = '/api_v1_receiveorder_paymentdeliveryconvert/search';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_count = '/api_v1_receiveorder_paymentdeliveryconvert/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'payment_delivery_convert_text',
        'payment_delivery_convert_type',
        'payment_delivery_convert_multi_id',
        'payment_delivery_convert_delivery_id',
        'payment_delivery_convert_deleted_flag',
        'payment_delivery_convert_creation_date',
        'payment_delivery_convert_last_modified_date',
        'payment_delivery_convert_creator_id',
        'payment_delivery_convert_creator_name',
        'payment_delivery_convert_last_modified_by_id',
        'payment_delivery_convert_last_modified_by_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'payment_delivery_convert_creation_date',
        'payment_delivery_convert_last_modified_date'
    ];
}
