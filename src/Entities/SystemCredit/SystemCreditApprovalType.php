<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * クレジット承認区分情報
 *
 * Class SystemCreditApprovalType
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemCredit
 *
 * @property string credit_approval_type_id クレジット承認区分
 * @property string credit_approval_type_name クレジット承認名
 */
class SystemCreditApprovalType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_creditapprovaltype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'credit_approval_type_id',
        'credit_approval_type_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
