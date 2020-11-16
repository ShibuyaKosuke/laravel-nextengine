<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * Class MasterShop
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterShop
 *
 * @property integer shop_id 店舗ID
 */
class MasterShopMailAddress extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'shop_id';

    /**
     * @var string 受注情報取り込み用メールアドレス取得エンドポイント
     */
    public static $endpoint_mail_address = '/api_v1_master_shop/mailaddress';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'shop_id',
        'receiveorder_mail_address',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
