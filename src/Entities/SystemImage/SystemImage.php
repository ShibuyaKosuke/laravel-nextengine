<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemImage;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 画像分類タグ
 *
 * Class SystemImage
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemImage
 *
 * @property integer image_tag_id 画像分類タグID
 * @property integer image_tag_mall_id モール/カートID
 * @property integer image_tag_mall_sub_id モール/カートID(サブ)
 * @property string image_tag_text 画像分類タグ
 * @property integer image_tag_auto_register_no 自動登録用タグ番号
 * @property integer image_tag_display_order 並び順
 * @property string image_tag_deleted_flag 削除フラグ
 * @property Carbon image_tag_creation_date 作成日
 * @property Carbon image_tag_last_modified_date 最終更新日
 * @property Carbon image_tag_last_modified_null_safe_date 最終更新日
 * @property integer image_tag_creator_id 作成担当者ID
 * @property string image_tag_creator_name 作成担当者名
 * @property integer image_tag_last_modified_by_id 最終更新者ID
 * @property integer image_tag_last_modified_by_null_safe_id 最終更新者ID
 * @property string image_tag_last_modified_by_name 最終更新者名
 * @property string image_tag_last_modified_by_null_safe_name 最終更新者名
 */
class SystemImage extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'image_tag_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_system_imagetag/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_system_imagetag/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'image_tag_id',
        'image_tag_mall_id',
        'image_tag_mall_sub_id',
        'image_tag_text',
        'image_tag_auto_register_no',
        'image_tag_display_order',
        'image_tag_deleted_flag',
        'image_tag_creation_date',
        'image_tag_last_modified_date',
        'image_tag_last_modified_null_safe_date',
        'image_tag_creator_id',
        'image_tag_creator_name',
        'image_tag_last_modified_by_id',
        'image_tag_last_modified_by_null_safe_id',
        'image_tag_last_modified_by_name',
        'image_tag_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'image_tag_creation_date',
        'image_tag_last_modified_date',
        'image_tag_last_modified_null_safe_date',
    ];
}