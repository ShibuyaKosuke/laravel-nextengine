<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\NoticeExecution;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 実行結果お知らせ
 *
 * Class NoticeExecution
 * @package ShibuyaKosuke\LaravelNextEngine\Entities\NoticeExecution
 *
 * @property integer execution_notice_id お知らせ通知ID
 * @property integer execution_notice_success 成功/失敗フラグ
 * @property string execution_notice_title 件名
 * @property string execution_notice_content 内容
 * @property integer execution_notice_read 既読/未読フラグ
 * @property Carbon execution_notice_creation_date 作成日
 * @property Carbon execution_notice_last_modified_date 最終更新日
 */
class NoticeExecution extends EntityCommon
{
    /**
     * 更新用キー
     */
    public const KEY = 'execution_notice_id';

    /**
     * @var string 検索エンドポイント
     */
    public static $endpoint_search = '/api_v1_notice_execution/search';

    /**
     * @var string 件数エンドポイント
     */
    public static $endpoint_count = '/api_v1_notice_execution/count';

    /**
     * @var string 追加エンドポイント
     */
    public static $endpoint_add = '/api_v1_notice_execution/add';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'execution_notice_id',
        'execution_notice_success',
        'execution_notice_title',
        'execution_notice_content',
        'execution_notice_read',
        'execution_notice_creation_date',
        'execution_notice_last_modified_date',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'execution_notice_creation_date',
        'execution_notice_last_modified_date',
    ];
}
