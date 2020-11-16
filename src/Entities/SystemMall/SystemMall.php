<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall;

use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * モール
 *
 * Class SystemMall
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall
 *
 * @property integer mall_id モール/カートID
 * @property string mall_name モール/カート名
 * @property string mall_kana モール/カートカナ
 * @property string mall_note 備考
 * @property string mall_country_id 国ID
 * @property string mall_deleted_flag 削除フラグ
 */
class SystemMall extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'image_tag_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_system_mall/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_system_mall/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'mall_id',
        'mall_name',
        'mall_kana',
        'mall_note',
        'mall_country_id',
        'mall_deleted_flag',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
    ];
}