<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine\Facades;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Facade;
use ShibuyaKosuke\LaravelNextEngine\ApiResultEntity;
use ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop\MasterShop;
use ShibuyaKosuke\LaravelNextEngine\Entities\NoticeExecution\NoticeExecution;
use ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder\ReceiveOrderBase;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * Class NextEngine
 * @package \ShibuyaKosuke\LaravelNextEngine\Facades
 *
 * @method static \ShibuyaKosuke\LaravelNextEngine\NextEngine login(string $redirect_uri = NULL)
 * @method static array|string loginForCli(string $redirect_uri = NULL)
 * @method static array getAccessToken()
 * @method static array company()
 * @method static ApiResultEntity loginUser()
 * @method static ApiResultEntity loginCompany()
 * @method static __construct(Application $app)
 * @method static \ShibuyaKosuke\LaravelNextEngine\NextEngine setAccount(NextEngineApi $nextEngineApi = NULL)
 * @method static array|string apiExecute(string $path, array $params = [], string $redirect_uri = NULL)
 * @method static ApiResultEntity receiveOrderBaseSearch(array $params = [])
 * @method static ApiResultEntity receiveOrderBaseCount(array $params = [])
 * @method static ApiResultEntity receiveOrderBaseUpdate(ReceiveOrderBase $receiveOrderBase, int $receive_order_shipped_update_flag = 0, int $receive_order_row_cancel_update_flag = 0)
 * @method static ApiResultEntity receiveOrderBaseBulkUpdate(array $receiveOrderBases, int $receive_order_shipped_update_flag = 0, int $receive_order_row_cancel_update_flag = 0)
 * @method static ApiResultEntity receiveOrderRowSearch(array $params = [])
 * @method static ApiResultEntity receiveOrderRowCount(array $params = [])
 * @method static ApiResultEntity receiveOrderOptionSearch(array $params = [])
 * @method static ApiResultEntity receiveOrderOptionCount(array $params = [])
 * @method static ApiResultEntity receiveOrderConfirmSearch(array $params = [])
 * @method static ApiResultEntity receiveOrderConfirmCount(array $params = [])
 * @method static ApiResultEntity receiveOrderGroupingTagSearch(array $params = [])
 * @method static ApiResultEntity receiveOrderForwardingAgentSearch(array $params = [])
 * @method static ApiResultEntity receiveOrderForwardingAgentCount(array $params = [])
 * @method static ApiResultEntity receiveOrderPaymentDeliveryConvertSearch(array $params = [])
 * @method static ApiResultEntity receiveOrderPaymentDeliveryConvertCount(array $params = [])
 * @method static ApiResultEntity receiveOrderUploadPattern()
 * @method static ApiResultEntity masterGoodsSearch(array $params = [])
 * @method static ApiResultEntity masterGoodsCount(array $params = [])
 * @method static ApiResultEntity masterGoodsUpload(array $params = [])
 * @method static ApiResultEntity masterGoodsTagSearch(array $params = [])
 * @method static ApiResultEntity masterGoodsTagCount(array $params = [])
 * @method static ApiResultEntity masterGoodsImageSearch(array $params = [])
 * @method static ApiResultEntity masterGoodsImageCount(array $params = [])
 * @method static ApiResultEntity masterGoodsImageTagSearch(array $params = [])
 * @method static ApiResultEntity masterGoodsImageTagCount(array $params = [])
 * @method static ApiResultEntity masterGoodsCategorySearch(array $params = [])
 * @method static ApiResultEntity masterGoodsCategoryCount(array $params = [])
 * @method static ApiResultEntity masterGoodsWholesaleSearch(array $params = [])
 * @method static ApiResultEntity masterGoodsWholesaleCount(array $params = [])
 * @method static ApiResultEntity masterMailTagSearch(array $params = [])
 * @method static ApiResultEntity masterMailTagCount(array $params = [])
 * @method static ApiResultEntity masterStockSearch(array $params = [])
 * @method static ApiResultEntity masterStockCount(array $params = [])
 * @method static ApiResultEntity masterKeepStockSearch(array $params = [])
 * @method static ApiResultEntity masterKeepStockCount(array $params = [])
 * @method static ApiResultEntity masterSupplierSearch(array $params = [])
 * @method static ApiResultEntity masterSupplierCount(array $params = [])
 * @method static ApiResultEntity supplyOrderSearch(array $params = [])
 * @method static ApiResultEntity supplyOrderCount(array $params = [])
 * @method static ApiResultEntity supplyOrderRowSearch(array $params = [])
 * @method static ApiResultEntity supplyOrderRowCount(array $params = [])
 * @method static ApiResultEntity placeOrderBaseSearch(array $params = [])
 * @method static ApiResultEntity placeOrderBaseCount(array $params = [])
 * @method static ApiResultEntity placeOrderRowSearch(array $params = [])
 * @method static ApiResultEntity placeOrderRowCount(array $params = [])
 * @method static ApiResultEntity masterWholesaleBaseSearch(array $params = [])
 * @method static ApiResultEntity masterWholesaleBaseCount(array $params = [])
 * @method static ApiResultEntity masterStockIoHistorySearch(array $params = [])
 * @method static ApiResultEntity masterStockIoHistoryCount(array $params = [])
 * @method static ApiResultEntity masterPageBaseSearch(array $params = [])
 * @method static ApiResultEntity masterPageBaseCount(array $params = [])
 * @method static ApiResultEntity masterPageBaseVariationOrOptionSearch(array $params = [])
 * @method static ApiResultEntity masterPageBaseVariationOrOptionCount(array $params = [])
 * @method static ApiResultEntity masterShopSearch(array $params = [])
 * @method static ApiResultEntity masterShopCount(array $params = [])
 * @method static ApiResultEntity masterShopCheckConnect(int $shop_id)
 * @method static ApiResultEntity masterShopMailAddress(int $shop_id)
 * @method static ApiResultEntity masterShopCreate(MasterShop $masterShop, int $test_flag = 0)
 * @method static ApiResultEntity masterShopUpdate(MasterShop $masterShop)
 * @method static ApiResultEntity systemImageSearch(array $params = [])
 * @method static ApiResultEntity systemImageCount(array $params = [])
 * @method static ApiResultEntity systemMallSearch(array $params = [])
 * @method static ApiResultEntity systemMallCount(array $params = [])
 * @method static ApiResultEntity systemMallCategorySearch(array $params = [])
 * @method static ApiResultEntity systemMallCategoryCount(array $params = [])
 * @method static ApiResultEntity systemQueSearch(array $params = [])
 * @method static ApiResultEntity systemQueCount(array $params = [])
 * @method static ApiResultEntity noticeExecutionSearch(array $params = [])
 * @method static ApiResultEntity noticeExecutionCount(array $params = [])
 * @method static ApiResultEntity noticeExecutionAdd(NoticeExecution $notice_execution)
 * @method static ApiResultEntity systemCreditType()
 * @method static ApiResultEntity systemCreditAuthorizationCenter()
 * @method static ApiResultEntity systemCreditApprovalType()
 * @method static ApiResultEntity systemOrder()
 * @method static ApiResultEntity systemOrderCondition()
 * @method static ApiResultEntity systemOrderStatus()
 * @method static ApiResultEntity systemDelivery()
 * @method static ApiResultEntity systemDeliveryDate()
 * @method static ApiResultEntity systemFraction()
 * @method static ApiResultEntity systemReturnedReason()
 * @method static ApiResultEntity systemCancelType()
 * @method static ApiResultEntity systemImportantCheck()
 * @method static ApiResultEntity systemConfirmCheck()
 * @method static ApiResultEntity systemCustomerType()
 * @method static ApiResultEntity systemDepositType()
 * @method static ApiResultEntity systemIoType()
 * @method static ApiResultEntity systemSelect()
 * @method static ApiResultEntity systemPaymentMethod()
 * @method static ApiResultEntity systemPayout()
 * @method static ApiResultEntity systemSocialInsurance()
 * @method static ApiResultEntity systemGoodsType()
 * @method static ApiResultEntity systemGoodsStatus()
 * @method static ApiResultEntity systemMerchandise()
 * @method static ApiResultEntity systemImportType()
 * @method static ApiResultEntity systemForwardingMethod()
 * @method static ApiResultEntity systemTax()
 * @method static ApiResultEntity systemItem()
 * @method static ApiResultEntity systemPageStatus()
 * @method static ApiResultEntity systemAuthorizationType()
 * @method static ApiResultEntity systemCurrencyUnit()
 */
class NextEngine extends Facade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor(): string
    {
        return 'nextengine.client';
    }
}
