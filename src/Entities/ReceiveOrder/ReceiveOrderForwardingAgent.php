<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 受注分類タグ
 *
 * Class ReceiveOrderForwardingAgent
 * @package ShibuyaKosuke\LaravelNextEngine\Entities
 *
 * @property string forwarding_agent_id 発送方法区分
 * @property string forwarding_agent_type 発送方法別項目タイプ
 * @property string forwarding_agent_type_id 発送方法別項目区分
 * @property string forwarding_agent_type_name 発送方法別項目名
 * @property integer forwarding_agent_display_order 表示順序
 * @property string forwarding_agent_deleted_flag 削除フラグ
 */
class ReceiveOrderForwardingAgent extends EntityCommon
{
    /**
     * @var string エンドポイント
     */
    public static $endpoint_search = '/api_v1_receiveorder_forwardingagent/search';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_count = '/api_v1_receiveorder_forwardingagent/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'forwarding_agent_id',
        'forwarding_agent_type',
        'forwarding_agent_type_id',
        'forwarding_agent_type_name',
        'forwarding_agent_display_order',
        'forwarding_agent_deleted_flag',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
