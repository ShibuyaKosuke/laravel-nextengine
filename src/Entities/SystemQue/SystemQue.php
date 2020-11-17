<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\SystemQue;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * アップロードキュー
 *
 * Class SystemQue
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\SystemQue
 *
 * @property integer que_id アップロードキューID
 * @property string que_method_name 機能名
 * @property string que_shop_id 店舗ID
 * @property string que_upload_name アップロード名
 * @property string que_client_file_name クライアントファイル名
 * @property string que_file_name ファイル名
 * @property integer que_status_id ステータス
 * @property string que_message メッセージ
 * @property string que_deleted_flag 削除フラグ
 * @property Carbon que_creation_date 作成日
 * @property Carbon que_last_modified_date 最終更新日
 * @property Carbon que_last_modified_null_safe_date 最終更新日
 * @property integer que_creator_id 作成担当者ID
 * @property string que_creator_name 作成担当者名
 * @property integer que_last_modified_by_id 最終更新者ID
 * @property integer que_last_modified_by_null_safe_id 最終更新者ID
 * @property string que_last_modified_by_name 最終更新者名
 * @property string que_last_modified_by_null_safe_name 最終更新者名
 */
class SystemQue extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'que_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_system_que/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_system_que/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'que_id',
        'que_method_name',
        'que_shop_id',
        'que_upload_name',
        'que_client_file_name',
        'que_file_name',
        'que_status_id',
        'que_message',
        'que_deleted_flag',
        'que_creation_date',
        'que_last_modified_date',
        'que_last_modified_null_safe_date',
        'que_creator_id',
        'que_creator_name',
        'que_last_modified_by_id',
        'que_last_modified_by_null_safe_id',
        'que_last_modified_by_name',
        'que_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'que_creation_date',
        'que_last_modified_date',
        'que_last_modified_null_safe_date',
    ];
}
