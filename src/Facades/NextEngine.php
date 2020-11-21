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
 * @method static ApiResultEntity receiveOrderBaseSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderBaseCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderBaseUpdate(ReceiveOrderBase $receiveOrderBase, int $receive_order_shipped_update_flag = 0, int $receive_order_row_cancel_update_flag = 0)
 * @method static ApiResultEntity receiveOrderBaseBulkUpdate(array $receiveOrderBases, int $receive_order_shipped_update_flag = 0, int $receive_order_row_cancel_update_flag = 0)
 * @method static ApiResultEntity receiveOrderRowSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderRowCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderOptionSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderOptionCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderConfirmSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderConfirmCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderGroupingTagSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderForwardingAgentSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderForwardingAgentCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderPaymentDeliveryConvertSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderPaymentDeliveryConvertCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity receiveOrderUploadPattern(string $userClass = null)
 * @method static ApiResultEntity masterGoodsSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsUpload(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsTagSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsTagCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsImageSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsImageCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsImageTagSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsImageTagCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsCategorySearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsCategoryCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsWholesaleSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterGoodsWholesaleCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterMailTagSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterMailTagCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterStockSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterStockCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterKeepStockSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterKeepStockCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterSupplierSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterSupplierCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity supplyOrderSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity supplyOrderCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity supplyOrderRowSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity supplyOrderRowCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity placeOrderBaseSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity placeOrderBaseCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity placeOrderRowSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity placeOrderRowCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterWholesaleBaseSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterWholesaleBaseCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterStockIoHistorySearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterStockIoHistoryCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterPageBaseSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterPageBaseCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterPageBaseVariationOrOptionSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterPageBaseVariationOrOptionCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterShopSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterShopCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity masterShopCheckConnect(int $shop_id)
 * @method static ApiResultEntity masterShopMailAddress(int $shop_id)
 * @method static ApiResultEntity masterShopCreate(MasterShop $masterShop, int $test_flag = 0)
 * @method static ApiResultEntity masterShopUpdate(MasterShop $masterShop)
 * @method static ApiResultEntity systemImageSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity systemImageCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity systemMallSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity systemMallCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity systemMallCategorySearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity systemMallCategoryCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity systemQueSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity systemQueCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity noticeExecutionSearch(array $params = [], string $userClass = null)
 * @method static ApiResultEntity noticeExecutionCount(array $params = [], string $userClass = null)
 * @method static ApiResultEntity noticeExecutionAdd(NoticeExecution $notice_execution)
 * @method static ApiResultEntity systemCreditType(string $userClass = null)
 * @method static ApiResultEntity systemCreditAuthorizationCenter(string $userClass = null)
 * @method static ApiResultEntity systemCreditApprovalType(string $userClass = null)
 * @method static ApiResultEntity systemOrder(string $userClass = null)
 * @method static ApiResultEntity systemOrderCondition(string $userClass = null)
 * @method static ApiResultEntity systemOrderStatus(string $userClass = null)
 * @method static ApiResultEntity systemDelivery(string $userClass = null)
 * @method static ApiResultEntity systemDeliveryDate(string $userClass = null)
 * @method static ApiResultEntity systemFraction(string $userClass = null)
 * @method static ApiResultEntity systemReturnedReason(string $userClass = null)
 * @method static ApiResultEntity systemCancelType(string $userClass = null)
 * @method static ApiResultEntity systemImportantCheck(string $userClass = null)
 * @method static ApiResultEntity systemConfirmCheck(string $userClass = null)
 * @method static ApiResultEntity systemCustomerType(string $userClass = null)
 * @method static ApiResultEntity systemDepositType(string $userClass = null)
 * @method static ApiResultEntity systemIoType(string $userClass = null)
 * @method static ApiResultEntity systemSelect(string $userClass = null)
 * @method static ApiResultEntity systemPaymentMethod(string $userClass = null)
 * @method static ApiResultEntity systemPayout(string $userClass = null)
 * @method static ApiResultEntity systemSocialInsurance(string $userClass = null)
 * @method static ApiResultEntity systemGoodsType(string $userClass = null)
 * @method static ApiResultEntity systemGoodsStatus(string $userClass = null)
 * @method static ApiResultEntity systemMerchandise(string $userClass = null)
 * @method static ApiResultEntity systemImportType(string $userClass = null)
 * @method static ApiResultEntity systemForwardingMethod(string $userClass = null)
 * @method static ApiResultEntity systemTax(string $userClass = null)
 * @method static ApiResultEntity systemItem(string $userClass = null)
 * @method static ApiResultEntity systemPageStatus(string $userClass = null)
 * @method static ApiResultEntity systemAuthorizationType(string $userClass = null)
 * @method static ApiResultEntity systemCurrencyUnit(string $userClass = null)
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
