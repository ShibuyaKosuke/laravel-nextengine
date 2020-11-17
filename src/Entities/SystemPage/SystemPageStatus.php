<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemPage;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * ページステータス区分情報
 *
 * Class SystemPageStatus
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemPage
 *
 * @property string page_status_id ページステータス区分名
 * @property string page_status_name ページステータス名
 */
class SystemPageStatus extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_pagestatus/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'page_status_id',
        'page_status_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
