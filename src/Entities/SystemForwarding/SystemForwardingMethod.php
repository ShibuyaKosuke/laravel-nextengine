<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemForwarding;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * Class SystemForwardingMethod
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemForwarding
 *
 * @property string forwarding_method_id 輸送区分
 * @property string forwarding_method_name 輸送名
 */
class SystemForwardingMethod extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_forwardingmethod/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'forwarding_method_id',
        'forwarding_method_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
