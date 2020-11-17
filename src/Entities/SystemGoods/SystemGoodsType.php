<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 商品区分情報
 *
 * Class SystemGoodsType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemGoods
 *
 * @property string goods_type_id 商品区分
 * @property string goods_type_name 商品名
 */
class SystemGoodsType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_goodstype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'goods_type_id',
        'goods_type_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
