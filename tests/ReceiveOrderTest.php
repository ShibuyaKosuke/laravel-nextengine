<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderConfirm;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderForwardingAgent;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderGroupingTag;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderOption;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderPaymentDeliveryConvert;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderRow;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderUploadPattern;

/**
 * Class ReceiveOrderTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class ReceiveOrderTest extends TestCase
{
    /**
     * 受注伝票検索
     */
    public function testReceiveOrderBaseSearch()
    {
        $apiResultEntity = $this->object->receiveOrderBaseSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        /** @var ReceiveOrderBase[] $orders */
        $orders = $apiResultEntity->data;

        foreach ($orders as $order) {
            self::assertInstanceOf(ReceiveOrderBase::class, $order);

            self::assertInstanceOf(ReceiveOrderOption::class, $order->getOrderOption());

            foreach ($order->getOrderRows() as $row) {
                self::assertInstanceOf(ReceiveOrderRow::class, $row);
            }
        }
    }

    /**
     * 受注伝票件数
     */
    public function testReceiveOrderBaseCount()
    {
        $apiResultEntity = $this->object->receiveOrderBaseCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 受注明細検索
     */
    public function testReceiveOrderRowSearch()
    {
        $apiResultEntity = $this->object->receiveOrderRowSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(ReceiveOrderRow::class, $data);
        }
    }

    /**
     * 受注明細件数
     */
    public function testReceiveOrderRowCount()
    {
        $apiResultEntity = $this->object->receiveOrderRowCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 受注オプション検索
     */
    public function testReceiveOrderOptionSearch()
    {
        $apiResultEntity = $this->object->receiveOrderOptionSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(ReceiveOrderOption::class, $data);
        }
    }

    /**
     * 受注オプション件数
     */
    public function testReceiveOrderOptionCount()
    {
        $apiResultEntity = $this->object->receiveOrderOptionCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 受注確認検索
     */
    public function testReceiveOrderConfirmSearch()
    {
        $apiResultEntity = $this->object->receiveOrderConfirmSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(ReceiveOrderConfirm::class, $data);
        }
    }

    /**
     * 受注確認件数
     */
    public function testReceiveOrderConfirmCount()
    {
        $apiResultEntity = $this->object->receiveOrderConfirmCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 受注分類タグ検索
     */
    public function testReceiveOrderGroupingTagSearch()
    {
        $apiResultEntity = $this->object->receiveOrderGroupingTagSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(ReceiveOrderGroupingTag::class, $data);
        }
    }

    /**
     * 受注確認検索
     */
    public function testReceiveOrderForwardingAgentSearch()
    {
        $apiResultEntity = $this->object->receiveOrderForwardingAgentSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(ReceiveOrderForwardingAgent::class, $data);
        }
    }

    /**
     * 受注確認件数
     */
    public function testReceiveOrderForwardingAgentCount()
    {
        $apiResultEntity = $this->object->receiveOrderForwardingAgentCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 支払発送変換検索
     */
    public function testReceiveOrderPaymentDeliveryConvertSearch()
    {
        $apiResultEntity = $this->object->receiveOrderPaymentDeliveryConvertSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(ReceiveOrderPaymentDeliveryConvert::class, $data);
        }
    }

    /**
     * 支払発送変換件数
     */
    public function testReceiveOrderPaymentDeliveryConvertCount()
    {
        $apiResultEntity = $this->object->receiveOrderPaymentDeliveryConvertCount();

        $this->assertEqualsApiResponseCount($apiResultEntity);
    }

    /**
     * 受注一括登録パターン情報
     */
    public function testReceiveOrderUploadPattern()
    {
        $apiResultEntity = $this->object->receiveOrderUploadPattern();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(ReceiveOrderUploadPattern::class, $data);
        }
    }
}
