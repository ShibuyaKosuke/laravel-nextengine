<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * モールカテゴリ
 *
 * Class SystemMallCategory
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemMall
 *
 * @property integer mall_category_id モールカテゴリID
 * @property integer mall_category_mall_id モール/カートID
 * @property string mall_category_code モールカテゴリコード
 * @property integer mall_category_parent_mall_category_id 親モールカテゴリID
 * @property string mall_category_name カテゴリ名
 * @property string mall_category_full_name カテゴリ名(フル)
 * @property string mall_category_deleted_flag 削除フラグ
 * @property Carbon mall_category_creation_date 作成日
 * @property Carbon mall_category_last_modified_date 最終更新日
 * @property Carbon mall_category_last_modified_null_safe_date 最終更新日
 * @property integer mall_category_creator_id 作成担当者ID
 * @property string mall_category_creator_name 作成担当者名
 * @property integer mall_category_last_modified_by_id 最終更新者ID
 * @property integer mall_category_last_modified_by_null_safe_id 最終更新者ID
 * @property string mall_category_last_modified_by_name 最終更新者名
 * @property string mall_category_last_modified_by_null_safe_name 最終更新者名
 */
class SystemMallCategory extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'mall_category_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_system_mallcategory/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_system_mallcategory/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'mall_category_id',
        'mall_category_mall_id',
        'mall_category_code',
        'mall_category_parent_mall_category_id',
        'mall_category_name',
        'mall_category_full_name',
        'mall_category_deleted_flag',
        'mall_category_creation_date',
        'mall_category_last_modified_date',
        'mall_category_last_modified_null_safe_date',
        'mall_category_creator_id',
        'mall_category_creator_name',
        'mall_category_last_modified_by_id',
        'mall_category_last_modified_by_null_safe_id',
        'mall_category_last_modified_by_name',
        'mall_category_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'mall_category_creation_date',
        'mall_category_last_modified_date',
        'mall_category_last_modified_null_safe_date',
    ];
}
