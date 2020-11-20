<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 受注明細
 *
 * Class ReceiveOrderRow
 * @package ShibuyaKosuke\LaravelNextEngine\Entities
 *
 * @property integer receive_order_row_receive_order_id 伝票番号
 * @property string receive_order_row_shop_cut_form_id 受注番号
 * @property integer receive_order_row_no 明細行番号
 * @property string receive_order_row_shop_row_no 受注明細行番号
 * @property string receive_order_row_goods_id 商品コード
 * @property string receive_order_row_goods_name 商品名
 * @property integer receive_order_row_quantity 受注数
 * @property integer receive_order_row_unit_price 単価
 * @property integer receive_order_row_received_time_first_cost 受注時原価
 * @property integer receive_order_row_tax_rate 消費税率（%）
 * @property integer receive_order_row_wholesale_retail_ratio 掛率
 * @property integer receive_order_row_sub_total_price 小計金額
 * @property string receive_order_row_goods_option 商品OP
 * @property string receive_order_row_cancel_flag キャンセルフラグ
 * @property integer receive_order_include_from_order_id 同梱元伝票番号
 * @property integer receive_order_include_from_row_no 同梱元明細行番号
 * @property integer receive_order_row_multi_delivery_parent_order_id 複数配送親伝票番号
 * @property integer receive_order_row_divide_from_row_no 分割元明細行番号
 * @property integer receive_order_row_copy_from_row_no 複写元明細行番号
 * @property integer receive_order_row_stock_allocation_quantity 引当数
 * @property integer receive_order_row_advance_order_stock_allocation_quantity 予約引当数
 * @property Carbon receive_order_row_stock_allocation_date 引当日
 * @property string receive_order_row_received_time_merchandise_id 受注時取扱区分
 * @property string receive_order_row_received_time_merchandise_name 受注時取扱名
 * @property string receive_order_row_received_time_goods_type_id 受注時商品区分
 * @property string receive_order_row_received_time_goods_type_name 受注時商品名
 * @property integer receive_order_row_returned_good_quantity 良品返品数
 * @property integer receive_order_row_returned_bad_quantity 不良品返品数
 * @property string receive_order_row_returned_reason_id 返品事由区分
 * @property string receive_order_row_returned_reason_name 返品事由名
 * @property integer receive_order_row_org_row_no 元受注明細行番号
 * @property string receive_order_row_deleted_flag 削除フラグ
 * @property Carbon receive_order_row_creation_date 作成日
 * @property Carbon receive_order_row_last_modified_date 最終更新日
 * @property Carbon receive_order_row_last_modified_null_safe_date 最終更新日
 * @property Carbon receive_order_row_last_modified_newest_date 受注伝票・受注明細の最終更新日
 * @property integer receive_order_row_creator_id 作成担当者ID
 * @property string receive_order_row_creator_name 作成担当者名
 * @property integer receive_order_row_last_modified_by_id 最終更新者ID
 * @property integer receive_order_row_last_modified_by_null_safe_id 最終更新者ID
 * @property string receive_order_row_last_modified_by_name 最終更新者名
 * @property string receive_order_row_last_modified_by_null_safe_name 最終更新者名
 */
class ReceiveOrderRow extends EntityCommon
{
    /**
     * 更新用キー
     */
    const KEY = 'receive_order_row_receive_order_id';

    /**
     * @var string エンドポイント
     */
    public static $endpoint_search = '/api_v1_receiveorder_row/search';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_count = '/api_v1_receiveorder_row/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'receive_order_row_receive_order_id',
        'receive_order_row_shop_cut_form_id',
        'receive_order_row_no',
        'receive_order_row_shop_row_no',
        'receive_order_row_goods_id',
        'receive_order_row_goods_name',
        'receive_order_row_quantity',
        'receive_order_row_unit_price',
        'receive_order_row_received_time_first_cost',
        'receive_order_row_tax_rate',
        'receive_order_row_wholesale_retail_ratio',
        'receive_order_row_sub_total_price',
        'receive_order_row_goods_option',
        'receive_order_row_cancel_flag',
        'receive_order_include_from_order_id',
        'receive_order_include_from_row_no',
        'receive_order_row_multi_delivery_parent_order_id',
        'receive_order_row_divide_from_row_no',
        'receive_order_row_copy_from_row_no',
        'receive_order_row_stock_allocation_quantity',
        'receive_order_row_advance_order_stock_allocation_quantity',
        'receive_order_row_stock_allocation_date',
        'receive_order_row_received_time_merchandise_id',
        'receive_order_row_received_time_merchandise_name',
        'receive_order_row_received_time_goods_type_id',
        'receive_order_row_received_time_goods_type_name',
        'receive_order_row_returned_good_quantity',
        'receive_order_row_returned_bad_quantity',
        'receive_order_row_returned_reason_id',
        'receive_order_row_returned_reason_name',
        'receive_order_row_org_row_no',
        'receive_order_row_deleted_flag',
        'receive_order_row_creation_date',
        'receive_order_row_last_modified_date',
        'receive_order_row_last_modified_null_safe_date',
        'receive_order_row_last_modified_newest_date',
        'receive_order_row_creator_id',
        'receive_order_row_creator_name',
        'receive_order_row_last_modified_by_id',
        'receive_order_row_last_modified_by_null_safe_id',
        'receive_order_row_last_modified_by_name',
        'receive_order_row_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'receive_order_row_stock_allocation_date',
        'receive_order_row_creation_date',
        'receive_order_row_last_modified_date',
        'receive_order_row_last_modified_null_safe_date',
        'receive_order_row_last_modified_newest_date',
    ];

    /**
     * @param \DOMDocument $domDocument
     * @return \DOMElement|null
     */
    public function toXmlObject(\DOMDocument $domDocument): ?\DOMElement
    {
        if ($this->getDirties()) {
            $receive_order_row_no = $domDocument->createElement("receive_order_row_no");
            $receive_order_row_no->setAttribute('value', $this->receive_order_row_no);

            foreach ($this->getDirties() as $key => $value) {
                $receive_order_row_no->appendChild($domDocument->createElement($key, $value));
            }
            return $receive_order_row_no;
        }
        return null;
    }
}
