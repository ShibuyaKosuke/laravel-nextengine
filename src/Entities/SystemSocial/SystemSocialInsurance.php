<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemSocial;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 社会保険区分情報
 *
 * Class SystemSocialInsurance
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemSocial
 *
 * @property string social_insurance_id 社会保険区分
 * @property string social_insurance_name 社会保険名
 */
class SystemSocialInsurance extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_socialinsurance/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'social_insurance_id',
        'social_insurance_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
