<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderOption;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderRow;
use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;

/**
 * Class ReceiveOrderBaseTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class ReceiveOrderBaseTest extends TestCase
{
    private $receiveOrderBase;
    private $receiveOrderOption;
    private $receiveOrderRows = [];

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->receiveOrderBase = new ReceiveOrderBase(
            [
                'receive_order_shop_id' => '1',
                'receive_order_id' => '1',
                'receive_order_shop_cut_form_id' => '20200923163637604',
                'receive_order_date' => '2020-09-23 16:37:23',
                'receive_order_import_date' => '2020-09-23 16:37:23',
                'receive_order_important_check_id' => '0',
                'receive_order_important_check_name' => '',
                'receive_order_confirm_check_id' => '2',
                'receive_order_confirm_check_name' => '確認済（表示）',
                'receive_order_confirm_ids' => null,
                'receive_order_mail_status' => 'JNHF',
                'receive_order_gruoping_tag' => null,
                'receive_order_import_type_id' => '2',
                'receive_order_import_type_name' => '手入力',
                'receive_order_cancel_type_id' => '0',
                'receive_order_cancel_type_name' => '有効な受注です。',
                'receive_order_cancel_date' => null,
                'receive_order_order_status_id' => '20',
                'receive_order_order_status_name' => '納品書印刷待ち',
                'receive_order_delivery_id' => '13',
                'receive_order_delivery_name' => '佐川急便(e飛伝2)',
                'receive_order_payment_method_id' => '1',
                'receive_order_payment_method_name' => '代金引換',
                'receive_order_total_amount' => '1800.00',
                'receive_order_tax_amount' => '0.00',
                'receive_order_charge_amount' => '0.00',
                'receive_order_delivery_fee_amount' => '0.00',
                'receive_order_other_amount' => '0.00',
                'receive_order_point_amount' => '0.00',
                'receive_order_goods_amount' => '1800.00',
                'receive_order_deposit_amount' => '0.00',
                'receive_order_deposit_type_id' => '0',
                'receive_order_deposit_type_name' => '未入金',
                'receive_order_deposit_date' => null,
                'receive_order_note' => null,
                'receive_order_include_possible_order_id' => null,
                'receive_order_include_to_order_id' => null,
                'receive_order_multi_delivery_parent_order_id' => null,
                'receive_order_divide_from_order_id' => null,
                'receive_order_copy_from_order_id' => null,
                'receive_order_multi_delivery_parent_flag' => '0',
                'receive_order_statement_delivery_instruct_printing_date' => '0000-00-00 00:00:00',
                'receive_order_statement_delivery_printing_date' => null,
                'receive_order_statement_delivery_text' => null,
                'receive_order_send_date' => null,
                'receive_order_send_plan_date' => null,
                'receive_order_send_sequence' => null,
                'receive_order_worker_text' => null,
                'receive_order_picking_instruct' => null,
                'receive_order_label_print_date' => null,
                'receive_order_label_print_flag' => '0',
                'receive_order_hope_delivery_date' => null,
                'receive_order_hope_delivery_time_slot_id' => null,
                'receive_order_hope_delivery_time_slot_name' => null,
                'receive_order_delivery_method_id' => '000',
                'receive_order_delivery_method_name' => null,
                'receive_order_seal1_id' => '008',
                'receive_order_seal1_name' => '現金決済',
                'receive_order_seal2_id' => null,
                'receive_order_seal2_name' => null,
                'receive_order_seal3_id' => null,
                'receive_order_seal3_name' => null,
                'receive_order_seal4_id' => null,
                'receive_order_seal4_name' => null,
                'receive_order_business_office_stop_id' => null,
                'receive_order_business_office_stop_name' => null,
                'receive_order_invoice_id' => null,
                'receive_order_invoice_name' => null,
                'receive_order_temperature_id' => null,
                'receive_order_temperature_name' => null,
                'receive_order_business_office_name' => null,
                'receive_order_gift_flag' => '0',
                'receive_order_delivery_cut_form_id' => null,
                'receive_order_delivery_cut_form_note' => null,
                'receive_order_credit_type_id' => '0',
                'receive_order_credit_type_name' => 'なし',
                'receive_order_credit_approval_no' => null,
                'receive_order_credit_approval_amount' => '0.00',
                'receive_order_credit_approval_type_id' => '0',
                'receive_order_credit_approval_type_name' => '必要なし',
                'receive_order_credit_approval_date' => null,
                'receive_order_credit_approval_rate' => '0.00',
                'receive_order_credit_number_payments' => null,
                'receive_order_credit_authorization_center_id' => null,
                'receive_order_credit_authorization_center_name' => null,
                'receive_order_credit_approval_fax_printing_date' => null,
                'receive_order_customer_type_id' => '0',
                'receive_order_customer_type_name' => '一般顧客',
                'receive_order_customer_id' => null,
                'receive_order_purchaser_name' => '',
                'receive_order_purchaser_kana' => '',
                'receive_order_purchaser_zip_code' => '',
                'receive_order_purchaser_address1' => '',
                'receive_order_purchaser_address2' => '8F',
                'receive_order_purchaser_tel' => '',
                'receive_order_purchaser_fax' => null,
                'receive_order_purchaser_mail_address' => null,
                'receive_order_consignee_name' => '',
                'receive_order_consignee_kana' => '',
                'receive_order_consignee_zip_code' => '',
                'receive_order_consignee_address1' => '',
                'receive_order_consignee_address2' => '',
                'receive_order_consignee_tel' => '',
                'receive_order_consignee_fax' => null,
                'receive_order_important_check_pic_id' => null,
                'receive_order_important_check_pic_name' => null,
                'receive_order_pic_id' => '2',
                'receive_order_pic_name' => '',
                'receive_order_send_pic_id' => null,
                'receive_order_send_pic_name' => null,
                'receive_order_creation_date' => '2020-09-23 16:37:23',
                'receive_order_last_modified_date' => '2020-10-05 20:10:46',
                'receive_order_last_modified_null_safe_date' => '2020-10-05 20:10:46',
                'receive_order_creator_id' => '2',
                'receive_order_creator_name' => '',
                'receive_order_last_modified_by_id' => '2',
                'receive_order_last_modified_by_null_safe_id' => '2',
                'receive_order_last_modified_by_name' => '',
                'receive_order_last_modified_by_null_safe_name' => '',
            ]
        );
        $this->receiveOrderOption = new ReceiveOrderOption(
            [
                'receive_order_option_receive_order_id' => '2',
                'receive_order_option_single_word_memo' => '',
                'receive_order_option_message' => '',
                'receive_order_option_noshi' => '',
                'receive_order_option_rapping' => '',
                'receive_order_option_1' => '',
                'receive_order_option_2' => '',
                'receive_order_option_3' => '',
                'receive_order_option_4' => '',
                'receive_order_option_5' => '',
                'receive_order_option_6' => '',
                'receive_order_option_7' => '',
                'receive_order_option_8' => '',
                'receive_order_option_9' => '',
                'receive_order_option_10' => '',
                'receive_order_option_received_time_shop_coupon' => '0.00',
                'receive_order_option_received_time_mall_coupon' => '0.00',
                'receive_order_option_creation_date' => '2020-09-24 10:56:45',
                'receive_order_option_last_modified_date' => '2020-11-06 12:45:26',
                'receive_order_option_last_modified_null_safe_date' => '2020-11-06 12:45:26',
                'receive_order_option_creator_id' => '2',
                'receive_order_option_creator_name' => '',
                'receive_order_option_last_modified_by_id' => '2',
                'receive_order_option_last_modified_by_null_safe_id' => '2',
                'receive_order_option_last_modified_by_name' => '',
                'receive_order_option_last_modified_by_null_safe_name' => '',
            ]
        );
        $this->receiveOrderRows[] = new ReceiveOrderRow(
            [
                'receive_order_row_receive_order_id' => '2',
                'receive_order_row_shop_cut_form_id' => 'ST000001',
                'receive_order_row_no' => '1',
                'receive_order_row_shop_row_no' => null,
                'receive_order_row_goods_id' => '52-6421',
                'receive_order_row_goods_name' => 'ココットプレート(標準グリル)【ミントグリーン】【型番：RBO-PC91S-M】',
                'receive_order_row_quantity' => '2',
                'receive_order_row_unit_price' => '9800.00',
                'receive_order_row_received_time_first_cost' => '4900.00',
                'receive_order_row_tax_rate' => '10',
                'receive_order_row_wholesale_retail_ratio' => '10.0',
                'receive_order_row_sub_total_price' => '19600.00',
                'receive_order_row_goods_option' => null,
                'receive_order_row_cancel_flag' => '0',
                'receive_order_include_from_order_id' => null,
                'receive_order_include_from_row_no' => null,
                'receive_order_row_multi_delivery_parent_order_id' => null,
                'receive_order_row_divide_from_row_no' => null,
                'receive_order_row_copy_from_row_no' => null,
                'receive_order_row_stock_allocation_quantity' => '2',
                'receive_order_row_advance_order_stock_allocation_quantity' => '0',
                'receive_order_row_stock_allocation_date' => '2020-09-24 11:57:26',
                'receive_order_row_received_time_merchandise_id' => '0',
                'receive_order_row_received_time_merchandise_name' => '取扱中',
                'receive_order_row_received_time_goods_type_id' => '0',
                'receive_order_row_received_time_goods_type_name' => '通常',
                'receive_order_row_returned_good_quantity' => '0',
                'receive_order_row_returned_bad_quantity' => '0',
                'receive_order_row_returned_reason_id' => null,
                'receive_order_row_returned_reason_name' => null,
                'receive_order_row_org_row_no' => null,
                'receive_order_row_deleted_flag' => '0',
                'receive_order_row_creation_date' => '2020-09-24 10:56:45',
                'receive_order_row_last_modified_date' => '2020-11-06 12:45:26',
                'receive_order_row_last_modified_null_safe_date' => '2020-11-06 12:45:26',
                'receive_order_row_last_modified_newest_date' => '2020-11-06 12:45:26',
                'receive_order_row_creator_id' => '2',
                'receive_order_row_creator_name' => '',
                'receive_order_row_last_modified_by_id' => '2',
                'receive_order_row_last_modified_by_null_safe_id' => '2',
                'receive_order_row_last_modified_by_name' => '',
                'receive_order_row_last_modified_by_null_safe_name' => '',
            ]
        );
        $this->receiveOrderRows[] = new ReceiveOrderRow(
            [
                'receive_order_row_receive_order_id' => '2',
                'receive_order_row_shop_cut_form_id' => 'ST000001',
                'receive_order_row_no' => '2',
                'receive_order_row_shop_row_no' => null,
                'receive_order_row_goods_id' => '151-435-000',
                'receive_order_row_goods_name' => 'バーナーキャップＨ（ステンレス）【左右共通】 ※刻印 裏面｢EH15｣あり',
                'receive_order_row_quantity' => '1',
                'receive_order_row_unit_price' => '2300.00',
                'receive_order_row_received_time_first_cost' => '1150.00',
                'receive_order_row_tax_rate' => '10',
                'receive_order_row_wholesale_retail_ratio' => '10.0',
                'receive_order_row_sub_total_price' => '2300.00',
                'receive_order_row_goods_option' => null,
                'receive_order_row_cancel_flag' => '0',
                'receive_order_include_from_order_id' => null,
                'receive_order_include_from_row_no' => null,
                'receive_order_row_multi_delivery_parent_order_id' => null,
                'receive_order_row_divide_from_row_no' => null,
                'receive_order_row_copy_from_row_no' => null,
                'receive_order_row_stock_allocation_quantity' => '1',
                'receive_order_row_advance_order_stock_allocation_quantity' => '0',
                'receive_order_row_stock_allocation_date' => '2020-09-24 11:43:41',
                'receive_order_row_received_time_merchandise_id' => '0',
                'receive_order_row_received_time_merchandise_name' => '取扱中',
                'receive_order_row_received_time_goods_type_id' => '0',
                'receive_order_row_received_time_goods_type_name' => '通常',
                'receive_order_row_returned_good_quantity' => '0',
                'receive_order_row_returned_bad_quantity' => '0',
                'receive_order_row_returned_reason_id' => null,
                'receive_order_row_returned_reason_name' => null,
                'receive_order_row_org_row_no' => null,
                'receive_order_row_deleted_flag' => '0',
                'receive_order_row_creation_date' => '2020-09-24 10:56:45',
                'receive_order_row_last_modified_date' => '2020-11-06 12:45:26',
                'receive_order_row_last_modified_null_safe_date' => '2020-11-06 12:45:26',
                'receive_order_row_last_modified_newest_date' => '2020-11-06 12:45:26',
                'receive_order_row_creator_id' => '2',
                'receive_order_row_creator_name' => '',
                'receive_order_row_last_modified_by_id' => '2',
                'receive_order_row_last_modified_by_null_safe_id' => '2',
                'receive_order_row_last_modified_by_name' => '',
                'receive_order_row_last_modified_by_null_safe_name' => '',
            ]
        );
        $this->receiveOrderRows[] = new ReceiveOrderRow(
            [
                'receive_order_row_receive_order_id' => '2',
                'receive_order_row_shop_cut_form_id' => 'ST000001',
                'receive_order_row_no' => '3',
                'receive_order_row_shop_row_no' => null,
                'receive_order_row_goods_id' => '40-3381',
                'receive_order_row_goods_name' => '炊飯鍋(３合)/ガラス蓋　【型番：RTR-300D1】',
                'receive_order_row_quantity' => '0',
                'receive_order_row_unit_price' => '4200.00',
                'receive_order_row_received_time_first_cost' => '2100.00',
                'receive_order_row_tax_rate' => '10',
                'receive_order_row_wholesale_retail_ratio' => '10.0',
                'receive_order_row_sub_total_price' => '0.00',
                'receive_order_row_goods_option' => null,
                'receive_order_row_cancel_flag' => '1',
                'receive_order_include_from_order_id' => null,
                'receive_order_include_from_row_no' => null,
                'receive_order_row_multi_delivery_parent_order_id' => null,
                'receive_order_row_divide_from_row_no' => null,
                'receive_order_row_copy_from_row_no' => null,
                'receive_order_row_stock_allocation_quantity' => '0',
                'receive_order_row_advance_order_stock_allocation_quantity' => '0',
                'receive_order_row_stock_allocation_date' => null,
                'receive_order_row_received_time_merchandise_id' => '0',
                'receive_order_row_received_time_merchandise_name' => '取扱中',
                'receive_order_row_received_time_goods_type_id' => '0',
                'receive_order_row_received_time_goods_type_name' => '通常',
                'receive_order_row_returned_good_quantity' => '0',
                'receive_order_row_returned_bad_quantity' => '0',
                'receive_order_row_returned_reason_id' => null,
                'receive_order_row_returned_reason_name' => null,
                'receive_order_row_org_row_no' => null,
                'receive_order_row_deleted_flag' => '0',
                'receive_order_row_creation_date' => '2020-09-24 10:56:45',
                'receive_order_row_last_modified_date' => '2020-11-06 12:45:26',
                'receive_order_row_last_modified_null_safe_date' => '2020-11-06 12:45:26',
                'receive_order_row_last_modified_newest_date' => '2020-11-06 12:45:26',
                'receive_order_row_creator_id' => '2',
                'receive_order_row_creator_name' => '',
                'receive_order_row_last_modified_by_id' => '2',
                'receive_order_row_last_modified_by_null_safe_id' => '2',
                'receive_order_row_last_modified_by_name' => '',
                'receive_order_row_last_modified_by_null_safe_name' => '',
            ]
        );
    }

    /**
     * @return void
     * @throws NextEngineException
     */
    public function testToXml(): void
    {
        $this->receiveOrderBase->receive_order_shop_cut_form_id = '2';

        $this->receiveOrderOption->receive_order_option_received_time_shop_coupon = '1.00';

        $this->receiveOrderRows = array_map(
            static function (ReceiveOrderRow $receiveOrderRow) {
                $receiveOrderRow->receive_order_row_sub_total_price = 12345678;
                return $receiveOrderRow;
            },
            $this->receiveOrderRows
        );

        $dom = new \DomDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $root = $dom->appendChild($dom->createElement('root'));
        $result = $this->receiveOrderBase->toXmlObject($dom);
        $root->appendChild($result);

        $xml = $dom->saveXML();

        self::assertTrue(is_string($xml));
    }
}
