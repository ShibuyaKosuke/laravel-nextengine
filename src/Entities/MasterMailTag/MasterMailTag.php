<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\MasterMailTag;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * メールタグ
 *
 * Class MasterMailTag
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\MasterMailTag
 *
 * @property string mail_tag_id メールタグ
 * @property integer mail_tag_month 対応月
 * @property string mail_tag_name メールタグ概要
 * @property string mail_tag_note メールタグ備考
 * @property string mail_tag_message1 メッセージ1
 * @property string mail_tag_message2 メッセージ2
 * @property string mail_tag_message3 メッセージ1
 * @property string mail_tag_message4 メッセージ2
 * @property string mail_tag_message5 メッセージ1
 * @property string mail_tag_message6 メッセージ2
 * @property string mail_tag_deleted_flag 削除フラグ
 * @property Carbon mail_tag_creation_date 作成日
 * @property Carbon mail_tag_last_modified_date 最終更新日
 * @property Carbon mail_tag_last_modified_null_safe_date 最終更新日
 * @property integer mail_tag_creator_id 作成担当者ID
 * @property string mail_tag_creator_name 作成担当者名
 * @property integer mail_tag_last_modified_by_id 最終更新者ID
 * @property integer mail_tag_last_modified_by_null_safe_id 最終更新者ID
 * @property string mail_tag_last_modified_by_name 最終更新者名
 * @property string mail_tag_last_modified_by_null_safe_name 最終更新者名
 */
class MasterMailTag extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'mail_tag_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_master_mailtag/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_master_mailtag/count';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'mail_tag_id',
        'mail_tag_month',
        'mail_tag_name',
        'mail_tag_note',
        'mail_tag_message1',
        'mail_tag_message2',
        'mail_tag_message3',
        'mail_tag_message4',
        'mail_tag_message5',
        'mail_tag_message6',
        'mail_tag_deleted_flag',
        'mail_tag_creation_date',
        'mail_tag_last_modified_date',
        'mail_tag_last_modified_null_safe_date',
        'mail_tag_creator_id',
        'mail_tag_creator_name',
        'mail_tag_last_modified_by_id',
        'mail_tag_last_modified_by_null_safe_id',
        'mail_tag_last_modified_by_name',
        'mail_tag_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'mail_tag_creation_date',
        'mail_tag_last_modified_date',
        'mail_tag_last_modified_null_safe_date',
    ];
}