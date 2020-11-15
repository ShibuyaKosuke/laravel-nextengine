<?php

namespace ShibuyaKosuke\LaravelNextEngine\Tests;

use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderConfirm;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderForwardingAgent;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderGroupingTag;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderOption;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderPaymentDeliveryConvert;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderRow;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * Class ReceiveOrderTest
 * @package ShibuyaKosuke\LaravelNextEngine\Tests
 */
class ReceiveOrderTest extends TestCase
{
    private $object;

    private $uid = '379559016b83bfafda8d9f5c5f2f48a138e4e4e6fd19ee549f787b7dd2fadcab24bac978e6a0b7e63cbb8076ced0ccab8725560ad416ffc08aca936e138f7e7e';
    private $state = 'UThkdmlB78COL410KzSpJiA2QYnRPfHt';

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');

        $this->getEnvironmentSetUp($this->app);

        $this->nextEngineApi = factory(NextEngineApi::class)->make();

        $this->nextEngineApi->uid = $this->uid;
        $this->nextEngineApi->state = $this->state;

        $response = NextEngine::setAccount($this->nextEngineApi)->getAccessToken();

        $this->object = NextEngine::setAccount($this->nextEngineApi);
    }

    private function assertEqualsApiResponseSearch($apiResultEntity)
    {
        self::assertEquals('success', $apiResultEntity->result);
        self::assertNotNull($apiResultEntity->count);
        self::assertNotNull($apiResultEntity->data);
        self::assertNotNull($apiResultEntity->access_token);
        self::assertNotNull($apiResultEntity->refresh_token);
    }

    private function assertEqualsApiResponseCount($apiResultEntity)
    {
        self::assertEquals('success', $apiResultEntity->result);
        self::assertNotNull($apiResultEntity->count);
        self::assertNull($apiResultEntity->data);
        self::assertNotNull($apiResultEntity->access_token);
        self::assertNotNull($apiResultEntity->refresh_token);
    }

    /**
     * 受注伝票検索
     */
    public function testReceiveOrderBaseSearch()
    {
        $apiResultEntity = $this->object->receiveOrderBaseSearch();

        $this->assertEqualsApiResponseSearch($apiResultEntity);

        foreach ($apiResultEntity->data as $data) {
            self::assertInstanceOf(ReceiveOrderBase::class, $data);
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
}