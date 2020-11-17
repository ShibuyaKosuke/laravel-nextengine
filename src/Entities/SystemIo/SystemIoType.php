<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemIo;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 入出荷区分情報
 *
 * Class SystemIoTest
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemIo
 *
 * @property string io_type_id 入出荷区分
 * @property string io_type_name 入出荷名
 */
class SystemIoType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_iotype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'io_type_id',
        'io_type_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
