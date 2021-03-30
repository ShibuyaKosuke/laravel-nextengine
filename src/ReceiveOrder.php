<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use Arr;
use DomDocument;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityContract;
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
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderBaseSearch(array $params = [], string $userClass = null)
    {
        /** @var EntityCommon $class */
        $class = ($userClass) ?: ReceiveOrderBase::class;

        $params = array_merge(
            [
                'fields' => $class::getPropertiesString(),
                'access_token' => $this->access_token,
                'refresh_token' => $this->refresh_token,
                'wait_flag' => $this->getWaitFlag(),
            ],
            $params
        );

//        $server_name = 'https://' . \Illuminate\Support\Facades\Route::getCurrentRequest()->server('SERVER_NAME') . '?' . http_build_query($params);

        $response = $this->apiExecute($class::$endpoint_search, $params, null, $this->access_token);

        /** @var array $data */
        $data = $response['data'];

        $temp_response = $class::setData($response);

        /** @var $class [] $orders */
        $orders = $temp_response['data'];

        if (empty($data)) {
            return $this->entity->set($response);
        }

        // 受注確認内容
        $confirm_ids = str_replace(':', ',', implode(',', Arr::pluck($data, 'receive_order_confirm_ids')));
        if ($confirm_ids) {
            $confirms = $this->receiveOrderConfirmSearch(['confirm_id-in' => $confirm_ids]);
            foreach ($orders as $order) {
                /** @var ReceiveOrderConfirm $confirm */
                foreach ($confirms->data as $confirm) {
                    if (in_array($confirm->confirm_id, explode(':', $order->receive_order_confirm_ids), true)) {
                        $order->addOrderConfirm($confirm);
                    }
                }
            }
        }

        $ids_string = implode(',', Arr::pluck($data, 'receive_order_id'));

        // 受注オプション
        $orderOptions = $this->receiveOrderOptionSearch(['receive_order_option_receive_order_id-in' => $ids_string]);
        foreach ($orders as $order) {
            /** @var ReceiveOrderOption $orderOption */
            foreach ($orderOptions->data as $orderOption) {
                if ($orderOption->receive_order_option_receive_order_id === $order->receive_order_id) {
                    $order->setOrderOption($orderOption);
                }
            }
        }

        // 受注明細
        $orderRows = $this->receiveOrderRowSearch(['receive_order_row_receive_order_id-in' => $ids_string]);

        $orderRowsData = $orderRows->data;
        foreach ($orders as $order) {
            /** @var ReceiveOrderRow $orderRow */
            foreach ($orderRowsData as $orderRow) {
                if ($orderRow->receive_order_row_receive_order_id === $order->receive_order_id) {
                    $order->addOrderRow($orderRow);
                }
            }
        }

        /** @var string $goods_ids 複数商品IDのカンマ区切り */
        $goods_ids = implode(',', Arr::pluck($orderRows->data, 'receive_order_row_goods_id'));
        $goods = $this->masterGoodsSearch(['goods_id-in' => $goods_ids]);

        $temp_goods = [];
        foreach ($goods->data as $good) {
            $temp_goods[$good->goods_id] = $good;
        }
        foreach ($orderRowsData as $orderRow) {
            if (array_key_exists($orderRow->receive_order_row_goods_id, $temp_goods)) {
                $orderRow->setGoods($temp_goods[$orderRow->receive_order_row_goods_id]);
            }
        }

        $response['data'] = $orders;

        return $this->entity->set($response, null, 'receiveOrder');
    }

    /**
     * 受注伝票件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderBaseCount(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderBase::class);
    }

    /**
     * 受注伝票更新
     *
     * @param EntityContract $receiveOrderBase
     * @param integer $receive_order_shipped_update_flag 1:受注状態が「出荷確定済（完了）」でも更新可 1以外:受注状態が「出荷確定済（完了）」は更新不可
     * @param integer $receive_order_row_cancel_update_flag 1:受注伝票の受注キャンセル区分を0（有効）に変更したときに明細行のキャンセルフラグを有効にする 1以外:受注キャンセル区分を0（有効）に変更しても明細行のキャンセルフラグに影響なし
     * @return ApiResultEntity
     */
    public function receiveOrderBaseUpdate($receiveOrderBase, int $receive_order_shipped_update_flag = 0, int $receive_order_row_cancel_update_flag = 0, $access_token = null): ApiResultEntity
    {
        $dom = new DomDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $root = $dom->appendChild($dom->createElement('root'));

        if ($receiveOrderBasesXmlObject = $receiveOrderBase->toXmlObject($dom)) {
            $root->appendChild($receiveOrderBasesXmlObject);
        }

        // XMLに変換
        if ($receiveOrderBase->getOrderOption()) {
            $xmlOrderOption = $receiveOrderBase->getOrderOption()->toXmlObject($dom);
            if ($xmlOrderOption) {
                $root->appendChild($xmlOrderOption);
            }
        }

        // 更新内容が存在しないとき
        if (!$root->hasChildNodes()) {
            $dom = null;
        }

        $params = [
            'receive_order_id' => $receiveOrderBase->receive_order_id,
            'receive_order_last_modified_date' => $receiveOrderBase->receive_order_last_modified_date->format('Y-m-d H:i:s'),
            'data' => ($dom) ? $dom->saveXML() : null,
            'receive_order_shipped_update_flag' => $receive_order_shipped_update_flag,
            'receive_order_row_cancel_update_flag' => $receive_order_row_cancel_update_flag,
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(ReceiveOrderBase::$endpoint_update, $params, null, $access_token);
        return $this->entity->set($response, ReceiveOrderBase::class);
    }

    /**
     * 一括更新
     *
     * @param array|ReceiveOrderBase[] $receiveOrderBases
     * @param int $receive_order_shipped_update_flag
     * @param int $receive_order_row_cancel_update_flag
     * @return ApiResultEntity|null
     * @todo
     */
    public function receiveOrderBaseBulkUpdate(array $receiveOrderBases, int $receive_order_shipped_update_flag = 0, int $receive_order_row_cancel_update_flag = 0): ?ApiResultEntity
    {
        $dom = new DomDocument('1.0', 'UTF-8');
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
            return null;
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
        return $this->entity->set($response, ReceiveOrderBase::class);
    }

    /**
     * 受注明細検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderRowSearch(array $params = [], string $userClass = null): ApiResultEntity
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

        $response = $this->apiExecute(ReceiveOrderRow::$endpoint_search, $params, null, $this->access_token);
        return $this->entity->set($response, $userClass ?? ReceiveOrderRow::class);
    }

    /**
     * 受注明細件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderRowCount(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderRow::class);
    }

    /**
     * 受注オプション検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderOptionSearch(array $params = [], string $userClass = null): ApiResultEntity
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

        $response = $this->apiExecute(ReceiveOrderOption::$endpoint_search, $params, null, $this->access_token);
        return $this->entity->set($response, $userClass ?? ReceiveOrderOption::class);
    }

    /**
     * 受注オプション件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderOptionCount(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderOption::class);
    }

    /**
     * 受注確認内容検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderConfirmSearch(array $params = [], string $userClass = null): ApiResultEntity
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

        $response = $this->apiExecute(ReceiveOrderConfirm::$endpoint_search, $params, null, $this->access_token);
        return $this->entity->set($response, $userClass ?? ReceiveOrderConfirm::class);
    }

    /**
     * 受注確認内容件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderConfirmCount(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderConfirm::class);
    }

    /**
     * 受注分類タグ検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderGroupingTagSearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderGroupingTag::class);
    }

    /**
     * 受注確認内容検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderForwardingAgentSearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderForwardingAgent::class);
    }

    /**
     * 受注確認内容件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderForwardingAgentCount(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderForwardingAgent::class);
    }

    /**
     * 受注確認内容検索
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderPaymentDeliveryConvertSearch(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderPaymentDeliveryConvert::class);
    }

    /**
     * 受注確認内容件数
     *
     * @param array $params
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderPaymentDeliveryConvertCount(array $params = [], string $userClass = null): ApiResultEntity
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
        return $this->entity->set($response, $userClass ?? ReceiveOrderPaymentDeliveryConvert::class);
    }

    /**
     * 受注一括登録パターン情報
     *
     * @param string|null $userClass
     * @return ApiResultEntity
     */
    public function receiveOrderUploadPattern(string $userClass = null): ApiResultEntity
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        $response = $this->apiExecute(ReceiveOrderUploadPattern::$endpoint_info, $params);
        return $this->entity->set($response, $userClass ?? ReceiveOrderUploadPattern::class);
    }
}
