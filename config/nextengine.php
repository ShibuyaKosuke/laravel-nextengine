<?php

/**
 * Config for NextEngine
 */

return [

    /*
     * デバッグモード
     *
     * 有効にすると、ログを出力します。
     */
    'debug' => false,

    /**
     * 「待機フラグ」のデフォルト設定
     *
     * 高負荷な処理(バッチ処理、大量検索・大量更新)や、アプリ側の1連の処理を途切れさせたくない場合に 1 を指定する。
     *
     * default value for "wait flag"
     */
    'wait_flag' => 0,

    /*
     * ネクストエンジンの管理者アカウント
     */
    'pic_mail_address' => env('NEXT_ENGINE_USERNAME'),
    'password' => env('NEXT_ENGINE_PASSWORD'),

    /*
     * アカウントを共有する場合、共有するアカウントの設定を記述する
     */
    'account' => [
        'client_id' => env('NEXT_ENGINE_CLIENT_ID'),
        'client_secret' => env('NEXT_ENGINE_CLIENT_SECRET'),
        'redirect_uri' => env('NEXT_ENGINE_REDIRECT_URI'),
    ]

];
