<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemImport;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 取込種類区分情報
 *
 * Class SystemImport
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemSocial
 *
 * @property string import_type_id 取込種類区分
 * @property string import_type_name 取込種類名
 */
class SystemImportType extends EntityCommon
{
    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_info = '/api_v1_system_importtype/info';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'import_type_id',
        'import_type_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}
