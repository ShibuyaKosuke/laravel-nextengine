<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 受注オプション
 *
 * Class ReceiveOrderRow
 * @package ShibuyaKosuke\LaravelNextEngine\Entities
 *
 * @property integer receive_order_option_receive_order_id 伝票番号
 * @property string receive_order_option_single_word_memo 一言メモ
 * @property string receive_order_option_message メッセージ
 * @property string receive_order_option_noshi のし
 * @property string receive_order_option_rapping ラッピング
 * @property string receive_order_option_1 オプション1
 * @property string receive_order_option_2 オプション2
 * @property string receive_order_option_3 オプション3
 * @property string receive_order_option_4 オプション4
 * @property string receive_order_option_5 オプション5
 * @property string receive_order_option_6 オプション6
 * @property string receive_order_option_7 オプション7
 * @property string receive_order_option_8 オプション8
 * @property string receive_order_option_9 オプション9
 * @property string receive_order_option_10 オプション10
 * @property integer receive_order_option_received_time_shop_coupon 受注時店舗原資クーポン
 * @property integer receive_order_option_received_time_mall_coupon 受注時モール原資クーポン
 * @property Carbon receive_order_option_creation_date 作成日
 * @property Carbon receive_order_option_last_modified_date 最終更新日
 * @property Carbon receive_order_option_last_modified_null_safe_date 最終更新日
 * @property integer receive_order_option_creator_id 作成担当者ID
 * @property string receive_order_option_creator_name 作成担当者名
 * @property integer receive_order_option_last_modified_by_id 最終更新者ID
 * @property integer receive_order_option_last_modified_by_null_safe_id 最終更新者ID
 * @property string receive_order_option_last_modified_by_name 最終更新者名
 * @property string receive_order_option_last_modified_by_null_safe_name 最終更新者名
 */
class ReceiveOrderOption extends EntityCommon
{
    /**
     * 更新用キー
     */
    const KEY = 'receiveorder_option';

    /**
     * @var string エンドポイント
     */
    public static $endpoint_search = '/api_v1_receiveorder_option/search';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_count = '/api_v1_receiveorder_option/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'receive_order_option_receive_order_id',
        'receive_order_option_single_word_memo',
        'receive_order_option_message',
        'receive_order_option_noshi',
        'receive_order_option_rapping',
        'receive_order_option_1',
        'receive_order_option_2',
        'receive_order_option_3',
        'receive_order_option_4',
        'receive_order_option_5',
        'receive_order_option_6',
        'receive_order_option_7',
        'receive_order_option_8',
        'receive_order_option_9',
        'receive_order_option_10',
        'receive_order_option_received_time_shop_coupon',
        'receive_order_option_received_time_mall_coupon',
        'receive_order_option_creation_date',
        'receive_order_option_last_modified_date',
        'receive_order_option_last_modified_null_safe_date',
        'receive_order_option_creator_id',
        'receive_order_option_creator_name',
        'receive_order_option_last_modified_by_id',
        'receive_order_option_last_modified_by_null_safe_id',
        'receive_order_option_last_modified_by_name',
        'receive_order_option_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'receive_order_option_creation_date',
        'receive_order_option_last_modified_date',
        'receive_order_option_last_modified_null_safe_date',
    ];
}
