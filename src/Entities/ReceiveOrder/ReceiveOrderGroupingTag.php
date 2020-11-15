<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities\ReceiveOrder;

use Carbon\Carbon;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityCommon;

/**
 * 受注分類タグ
 *
 * Class ReceiveOrderGroupingTag
 * @package ShibuyaKosuke\LaravelNextEngine\Entities
 *
 * @property integer grouping_tag_id 受注分類タグID
 * @property string grouping_tag_name 受注分類タグ名
 * @property string grouping_tag_color 受注分類タグの背景色
 * @property string grouping_tag_str_color 受注分類タグの文字色
 * @property string grouping_tag_memo 受注分類タグのメモ欄
 * @property Carbon grouping_tag_creation_date 作成日
 * @property Carbon grouping_tag_last_modified_date 最終更新日
 * @property Carbon grouping_tag_last_modified_null_safe_date 最終更新日
 * @property integer grouping_tag_creator_id 作成担当者ID
 * @property string grouping_tag_creator_name 作成担当者名
 * @property integer grouping_tag_last_modified_by_id 最終更新者ID
 * @property integer grouping_tag_last_modified_by_null_safe_id 最終更新者ID
 * @property string grouping_tag_last_modified_by_name 最終更新者名
 * @property string grouping_tag_last_modified_by_null_safe_name 最終更新者名
 */
class ReceiveOrderGroupingTag extends EntityCommon
{
    /**
     * 更新用キー
     */
    const KEY = 'grouping_tag_id';

    /**
     * @var string エンドポイント
     */
    public static $endpoint_search = '/api_v1_receiveorder_groupingtag/search';

    /**
     * プロパティのリスト
     *
     * @var string[]
     */
    public static $properties = [
        'grouping_tag_id',
        'grouping_tag_name',
        'grouping_tag_color',
        'grouping_tag_str_color',
        'grouping_tag_memo',
        'grouping_tag_creation_date',
        'grouping_tag_last_modified_date',
        'grouping_tag_last_modified_null_safe_date',
        'grouping_tag_creator_id',
        'grouping_tag_creator_name',
        'grouping_tag_last_modified_by_id',
        'grouping_tag_last_modified_by_null_safe_id',
        'grouping_tag_last_modified_by_name',
        'grouping_tag_last_modified_by_null_safe_name',
    ];

    /**
     * 日付型のプロパティ
     *
     * @var string[]
     */
    public static $dates = [
        'grouping_tag_creation_date',
        'grouping_tag_last_modified_date',
        'grouping_tag_last_modified_null_safe_date',
    ];
}
