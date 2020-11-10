<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine;

use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * Class NextEngine
 * @package ShibuyaKosuke\LaravelNextEngine
 */
class NextEngine extends Base
{
    /**
     * NextEngineApi モデルを設定する
     *
     * @param NextEngineApi $nextEngineApi
     * @return $this
     * @throws NextEngineException
     */
    public function setAccount(NextEngineApi $nextEngineApi): self
    {
        $this->parseConfig($nextEngineApi);
        return $this;
    }

    /**
     * ログイン
     *
     * @param string|null $redirect_uri リダイレクトURI
     * @return self
     * @throws NextEngineException
     * @category 認証系エンドポイント
     */
    public function login(string $redirect_uri = null): self
    {
        $this->loginForCli($redirect_uri);
        return $this;
    }

    /**
     * ログイン(for Cli)
     *
     * @param string|null $redirect_uri リダイレクトURI
     * @return array|string
     * @throws NextEngineException
     * @category 認証系エンドポイント
     */
    public function loginForCli(string $redirect_uri = null)
    {
        $this->setRedirectUri($redirect_uri);

        $this->setUidAndState();

        $params = [
            'uid' => $this->uid,
            'state' => $this->state,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret
        ];

        return $this->execute(self::PATH_OAUTH, $params, $redirect_uri);
    }

    /**
     * NEログインaccess_token取得
     *
     * @return array
     * @throws NextEngineException
     * @category 認証系エンドポイント
     */
    public function getAccessToken(): array
    {
        $this->setUidAndState();

        $params = [
            'uid' => $this->uid,
            'state' => $this->state,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret
        ];

        return $this->execute('/api_neauth', $params);
    }

    /**
     * アプリ利用企業一覧
     *
     * @return array
     * @throws NextEngineException
     * @category 認証系エンドポイント
     */
    public function company(): array
    {
        $params = [
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret
        ];

        return $this->execute('/api_app/company', $params);
    }


    /**
     * ログインユーザー情報取得
     *
     * @return array
     * @throws NextEngineException
     * @category 認証系エンドポイント
     */
    public function loginUser(): array
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];
        return $this->execute('/api_v1_login_user/info', $params);
    }

    /**
     * 企業情報取得
     *
     * @return array
     * @throws NextEngineException
     * @category 認証系エンドポイント
     */
    public function loginCompany(): array
    {
        $params = [
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'wait_flag' => $this->getWaitFlag(),
        ];

        return $this->execute('/api_v1_login_company/info', $params);
    }
}
