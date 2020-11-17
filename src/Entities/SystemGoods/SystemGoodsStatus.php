<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 商品ステータス区分情報
 *
 * Class SystemGoodsType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods
 *
 * @property string goods_status_id 商品ステータス区分
 * @property string goods_status_name 商品ステータス名
 */
class SystemGoodsStatus extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_goodsstatus/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'goods_status_id',
        'goods_status_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
