<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use Illuminate\Support\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderConfirm;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderForwardingAgent;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderGroupingTag;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderOption;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderPaymentDeliveryConvert;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderRow;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderUploadPattern;

/**
 * 受注伝票系メソッド
 *
 * Trait ReceiveOrder
 * @package ShibuyaKosuke\LaravelNextEngine
 */
trait ReceiveOrder
{
    /**
     * 受注伝票検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderBaseSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderBase::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderBase::$endpoint_search, $params);

        /** @var array $data */
        $data = $response['data'];
        $ids_string = implode(',', \Arr::pluck($data, 'receive_order_id'));

        // 受注オプション
        $orderOptions = $this->receiveOrderOptionSearch(['receive_order_option_receive_order_id-in' => $ids_string]);

        // 受注明細
        $orderRows = $this->receiveOrderRowSearch(['receive_order_row_receive_order_id-in' => $ids_string]);

        $temp_response = ReceiveOrderBase::setData($response);

        /** @var ReceiveOrderBase[] $orders */
        $orders = $temp_response['data'];

        foreach ($orders as $order) {
            $receive_order_id = $order->receive_order_id;
            foreach ($orderOptions->data as $orderOption) {
                if ($orderOption->receive_order_option_receive_order_id === $receive_order_id) {
                    $order->setOrderOption($orderOption);
                }
            }
            foreach ($orderRows->data as $orderRow) {
                if ($orderRow->receive_order_row_receive_order_id === $receive_order_id) {
                    $order->addOrderRow($orderRow);
                }
            }
        }
        $response['data'] = $orders;

        return new ApiResultEntity($response);
    }

    /**
     * 受注伝票件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderBaseCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderBase::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderBase::setData($response));
    }

    /**
     * 受注伝票更新
     *
     * @param integer $receive_order_id 伝票番号
     * @param Carbon $receive_order_last_modified_date 最終更新日
     * @param ReceiveOrderBase $receiveOrderBase
     * @param integer $receive_order_shipped_update_flag 1:受注状態が「出荷確定済（完了）」でも更新可 1以外:受注状態が「出荷確定済（完了）」は更新不可
     * @param integer $receive_order_row_cancel_update_flag 1:受注伝票の受注キャンセル区分を0（有効）に変更したときに明細行のキャンセルフラグを有効にする 1以外:受注キャンセル区分を0（有効）に変更しても明細行のキャンセルフラグに影響なし
     * @return array
     */
    public function receiveOrderBaseUpdate(int $receive_order_id, Carbon $receive_order_last_modified_date, ReceiveOrderBase $receiveOrderBase, int $receive_order_shipped_update_flag = 0, int $receive_order_row_cancel_update_flag = 0): array
    {
        $dom = new \DomDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $root = $dom->appendChild($dom->createElement('root'));

        if ($receiveOrderBasesXmlObject = $receiveOrderBase->toXmlObject($dom)) {
            $root->appendChild($receiveOrderBasesXmlObject);
        }

        // 更新内容が存在しないとき
        if (!$root->hasChildNodes()) {
            $dom = null;
        }

        $params = [
            'receive_order_id' => $receive_order_id,
            'receive_order_last_modified_date' => $receive_order_last_modified_date,
            'data' => $dom->saveXML(),
            'receive_order_shipped_update_flag' => $receive_order_shipped_update_flag,
            'receive_order_row_cancel_update_flag' => $receive_order_row_cancel_update_flag,
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(ReceiveOrderBase::$endpoint_count, $params);
        return ReceiveOrderBase::setData($response);
    }

    /**
     * 一括更新
     *
     * @param array|ReceiveOrderBase[] $receiveOrderBases
     * @param int $receive_order_shipped_update_flag
     * @param int $receive_order_row_cancel_update_flag
     * @return array|void
     * @todo
     */
    public function receiveOrderBaseBulkUpdate(array $receiveOrderBases, int $receive_order_shipped_update_flag = 0, int $receive_order_row_cancel_update_flag = 0)
    {
        $dom = new \DomDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $root = $dom->appendChild($dom->createElement('root'));
        foreach ($receiveOrderBases as $receiveOrderBase) {
            if ($receiveOrderBasesXmlObject = $receiveOrderBase->toXmlObject($dom)) {
                $receiveorder = $dom->createElement('receiveorder');
                $receiveorder->setAttribute('receive_order_id', $receiveOrderBase->receive_order_id);
                $receiveorder->setAttribute('receive_order_last_modified_date', $receiveOrderBase->receive_order_last_modified_date);
                $receiveorder->appendChild($receiveOrderBasesXmlObject);
                $root->appendChild($receiveorder);
            }
        }

        // 更新内容が存在しないとき
        if (!$root->hasChildNodes()) {
            return;
        }

        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
            'data_type' => 'xml',
            'data' => $dom->saveXML(),
            'receive_order_shipped_update_flag' => $receive_order_shipped_update_flag,
            'receive_order_row_cancel_update_flag' => $receive_order_row_cancel_update_flag,
        ];
        $response = $this->apiExecute(ReceiveOrderBase::$endpoint_bulk_update, $params);
        return ReceiveOrderBase::setData($response);
    }

    /**
     * 受注明細検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderRowSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderRow::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderRow::$endpoint_search, $params);
        return new ApiResultEntity(ReceiveOrderRow::setData($response));
    }

    /**
     * 受注明細件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderRowCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderRow::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderRow::setData($response));
    }

    /**
     * 受注オプション検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderOptionSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderOption::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderOption::$endpoint_search, $params);
        return new ApiResultEntity(ReceiveOrderOption::setData($response));
    }

    /**
     * 受注オプション件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderOptionCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderOption::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderOption::setData($response));
    }

    /**
     * 受注確認内容検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderConfirmSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderConfirm::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderConfirm::$endpoint_search, $params);
        return new ApiResultEntity(ReceiveOrderConfirm::setData($response));
    }

    /**
     * 受注確認内容件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderConfirmCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderConfirm::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderConfirm::setData($response));
    }

    /**
     * 受注分類タグ検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderGroupingTagSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderGroupingTag::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderGroupingTag::$endpoint_search, $params);
        return new ApiResultEntity(ReceiveOrderGroupingTag::setData($response));
    }

    /**
     * 受注確認内容検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderForwardingAgentSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderForwardingAgent::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderForwardingAgent::$endpoint_search, $params);
        return new ApiResultEntity(ReceiveOrderForwardingAgent::setData($response));
    }

    /**
     * 受注確認内容件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderForwardingAgentCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderForwardingAgent::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderForwardingAgent::setData($response));
    }

    /**
     * 受注確認内容検索
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderPaymentDeliveryConvertSearch(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'fields' => ReceiveOrderPaymentDeliveryConvert::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderPaymentDeliveryConvert::$endpoint_search, $params);
        return new ApiResultEntity(ReceiveOrderPaymentDeliveryConvert::setData($response));
    }

    /**
     * 受注確認内容件数
     *
     * @param array $params
     * @return ApiResultEntity
     */
    public function receiveOrderPaymentDeliveryConvertCount(array $params = []): ApiResultEntity
    {
        $params = array_merge(
            [
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

        $response = $this->apiExecute(ReceiveOrderPaymentDeliveryConvert::$endpoint_count, $params);
        return new ApiResultEntity(ReceiveOrderPaymentDeliveryConvert::setData($response));
    }

    /**
     * 受注一括登録パターン情報
     *
     * @return ApiResultEntity
     */
    public function receiveOrderUploadPattern(): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(ReceiveOrderUploadPattern::$endpoint_info, $params);
        return new ApiResultEntity(ReceiveOrderUploadPattern::setData($response));
    }
}
