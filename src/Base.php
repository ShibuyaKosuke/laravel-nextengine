<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;
use ShibuyaKosuke\LaravelNextEngine\Services\HttpClient;

/**
 * Class Base
 * @package ShibuyaKosuke\LaravelNextEngine
 */
abstract class Base
{
    /**
     * NextEngine 認証サーバー
     */
    const BASE_SERVER_DOMAIN = 'https://base.next-engine.org';

    /**
     * NextEngine APIサーバー
     */
    const API_SERVER_DOMAIN = 'https://api.next-engine.org';

    /**
     * NextEngine ログイン
     */
    const PATH_LOGIN = '/users/sign_in/';

    /**
     * API認証
     */
    const PATH_OAUTH = '/api_neauth/';

    /**
     * 成功
     */
    const RESULT_SUCCESS = 'success';

    /**
     * 失敗
     */
    const RESULT_ERROR = 'error';

    /**
     * 要リダイレクト
     */
    const RESULT_REDIRECT = 'redirect';

    /**
     * Cli環境かどうか
     * @var boolean
     */
    protected $isCli;

    /**
     * NextEngineApi モデル
     *
     * @var NextEngineApi
     */
    protected $nextEngineApi;

    /**
     * config
     *
     * @var Repository
     */
    protected $config;

    /**
     * route
     *
     * @var Router
     */
    protected $router;

    /**
     * Request
     *
     * @var Request
     */
    protected $request;

    /**
     * デバッグ
     *
     * @var boolean
     */
    protected $debug = false;

    /**
     * クライアントID
     *
     * @var string
     */
    protected $client_id;

    /**
     * クライアントシークレット
     *
     * @var string
     */
    protected $client_secret;

    /**
     * リダイレクトURL
     *
     * @var string
     */
    protected $redirect_uri;

    /**
     * アクセストークン
     *
     * @var string
     */
    protected $access_token;

    /**
     * リフレッシュトークン
     *
     * @var string
     */
    protected $refresh_token;

    /**
     * アクセストークン期限
     *
     * @var Carbon
     */
    protected $access_token_end_date;

    /**
     * リフレッシュトークン期限
     *
     * @var Carbon
     */
    protected $refresh_token_end_date;

    /**
     * UID
     *
     * @var string
     */
    protected $uid;

    /**
     * State
     *
     * @var  string
     */
    protected $state;

    /**
     * @var ApiResultEntity
     */
    protected $entity;

    /**
     * NextEngine constructor.
     * @param Application $app
     * @throws NextEngineException
     */
    public function __construct(Application $app)
    {
        $this->isCli = (PHP_SAPI === 'cli');

        $this->config = $app['config'];
        $this->router = $app['router'];
        $this->request = $app['request'];
        $this->entity = new ApiResultEntity($this->request);

        $this->debug = $this->config->get('nextengine.debug');

        $this->setUidAndState();

        if (!$this->isCli) {
            $this->setAccount();
        }
    }

    /**
     * NextEngineApi モデルを設定する
     *
     * @param NextEngineApi|null $nextEngineApi
     * @return $this
     * @throws NextEngineException
     */
    public function setAccount(NextEngineApi $nextEngineApi = null): self
    {
        if (Auth::check()) {
            $nextEngineApi = $this->request->user()->nextEngineApi;
        }
        $this->parseConfig($nextEngineApi);
        return $this;
    }

    /**
     * URLパラメータから、UID・state をセットする
     *
     * @return void
     */
    protected function setUidAndState(): void
    {
        if ($current = $this->router->getCurrentRequest()) {
            $this->uid = $current->query('uid');
            $this->state = $current->query('state');
        }
    }

    /**
     * Config を読み込み
     *
     * @param NextEngineApi $nextEngineApi
     * @return void
     * @throws NextEngineException
     */
    protected function parseConfig(NextEngineApi $nextEngineApi): void
    {
        $this->nextEngineApi = $nextEngineApi;

        $this->uid = $this->nextEngineApi->uid;
        $this->state = $this->nextEngineApi->state;
        $this->client_id = $this->nextEngineApi->client_id;
        $this->client_secret = $this->nextEngineApi->client_secret;
        $this->redirect_uri = $this->nextEngineApi->redirect_uri;

        $this->checkConfig();
    }

    /**
     * 「待機フラグ」の値を取得する
     *
     * @return integer
     */
    protected function getWaitFlag(): int
    {
        return ($this->isCli || $this->config->get('nextengine.wait_flag')) === 1 ? 1 : 0;
    }

    /**
     * 設定値をチェックする
     *
     * @return bool
     * @throws NextEngineException
     */
    protected function checkConfig(): bool
    {
        if (empty($this->nextEngineApi)) {
            throw new NextEngineException('NextEngineApi Setting is not defined.');
        }
        if (empty($this->client_id)) {
            throw new NextEngineException('client_id is not defined.');
        }
        if (empty($this->client_secret)) {
            throw new NextEngineException('client_secret is not defined.');
        }
        if (empty($this->redirect_uri)) {
            throw new NextEngineException('redirect_uri is not defined.');
        }
        return true;
    }

    /**
     * ログインAPIにリクエストする
     *
     * @param string $path URI
     * @param array $params パラメータ
     * @param string|null $redirect_uri リダイレクトURI
     * @return array|string
     * @throws NextEngineException
     */
    protected function execute(string $path, array $params = [], string $redirect_uri = null)
    {
        $this->setRedirectUri($redirect_uri);
        $this->setUidAndState();
        return $this->httpRequest($path, $params);
    }

    /**
     * ログイン以外のAPIにリクエストする
     *
     * @param string $path
     * @param array $params
     * @param string|null $redirect_uri
     * @return array|string
     */
    public function apiExecute(string $path, array $params = [], string $redirect_uri = null)
    {
        return $this->login()->execute($path, $params, $redirect_uri);
    }

    /**
     * リクエストを実行する
     *
     * @param string $path
     * @param array $params
     * @return array|string|null
     * @throws NextEngineException
     */
    private function httpRequest(string $path, array $params = [])
    {
        try {
            $this->checkConfig();

            $params = array_merge(
                $params,
                [
                    'access_token' => $this->access_token,
                    'refresh_token' => $this->refresh_token,
                ]
            );

            $content = (new HttpClient())->post(self::API_SERVER_DOMAIN . $path, $params)
                ->getBody()
                ->getContents();

            $response = json_decode($content, true);
            $this->debugLog($response);

            $checked = $this->checkResponse($content);
            if (is_string($checked)) {
                return ['redirect' => $checked];
            }

            if ($this->updateAccount($response)) {
                return $response;
            }

            return null;
        } catch (GuzzleException $e) {
            throw new NextEngineException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * APIアカウント情報を更新する
     *
     * @param array $response
     * @return boolean
     */
    protected function updateAccount(array $response): bool
    {
        if ($current_request = $this->router->getCurrentRequest()) {
            $this->nextEngineApi->state = $current_request->query->get('state');
        }

        if (array_key_exists('uid', $response)) {
            $this->nextEngineApi->uid = $response['uid'];
        }
        if (array_key_exists('pic_mail_address', $response)) {
            $this->nextEngineApi->pic_mail_address = $response['pic_mail_address'];
        }
        if (array_key_exists('access_token', $response)) {
            $this->nextEngineApi->access_token = $response['access_token'];
        }
        if (array_key_exists('access_token_end_date', $response)) {
            $this->nextEngineApi->access_token_end_date = new Carbon($response['access_token_end_date']);
        }
        if (array_key_exists('refresh_token', $response)) {
            $this->nextEngineApi->refresh_token = $response['refresh_token'];
        }
        if (array_key_exists('refresh_token_end_date', $response)) {
            $this->nextEngineApi->refresh_token_end_date = new Carbon($response['refresh_token_end_date']);
        }

        $this->uid = $this->nextEngineApi->uid;
        $this->state = $this->nextEngineApi->state;
        $this->access_token = $this->nextEngineApi->access_token;
        $this->access_token_end_date = $this->nextEngineApi->access_token_end_date;
        $this->refresh_token = $this->nextEngineApi->refresh_token;
        $this->refresh_token_end_date = $this->nextEngineApi->refresh_token_end_date;

        return $this->nextEngineApi->save();
    }

    /**
     * レスポンスをチェックする
     *
     * @param string $content レスポンス
     * @return boolean|string
     * @throws NextEngineException
     */
    protected function checkResponse(string $content)
    {
        $response = json_decode($content, true);

        if (!array_key_exists('result', $response)) {
            throw new NextEngineException('Invalid Response returned.');
        }

        if ($response['result'] === self::RESULT_SUCCESS) {
            return true;
        }

        if ($response['result'] === self::RESULT_REDIRECT && !is_null($this->redirect_uri)) {
            return $this->redirect();
        }

        throw new NextEngineException(sprintf('API Error: %s %s', $response['code'], $response['message']));
    }

    /**
     * リダイレクトURI を設定する
     *
     * @param string|null $redirect_uri
     * @throws NextEngineException
     */
    protected function setRedirectUri(string $redirect_uri = null): void
    {
        if (!is_null($redirect_uri) && !filter_var($redirect_uri, FILTER_VALIDATE_URL)) {
            throw new NextEngineException(sprintf('Invalid argument: %s(%s)', __METHOD__, $redirect_uri));
        }

        $this->redirect_uri = (is_null($redirect_uri)) ? $this->request->fullUrl() : $redirect_uri;
    }

    /**
     * リダイレクト
     *
     * @return string
     * @throws NextEngineException
     */
    protected function redirect(): string
    {
        $params = [];
        if ($this->client_id) {
            $params['client_id'] = $this->client_id;
        }
        if ($this->redirect_uri) {
            $params['redirect_uri'] = $this->redirect_uri;
        }

        $path = self::BASE_SERVER_DOMAIN . self::PATH_LOGIN;
        $targetUrl = implode('?', [$path, http_build_query($params)]);

        if (PHP_SAPI === 'cli') {
            return $targetUrl;
        }

        if (!headers_sent($filename, $line)) {
            header("Location: {$targetUrl}");
            exit;
        }

        throw new NextEngineException(sprintf('Already sent headers!: File: %s, Line: %s', $filename, $line));
    }

    /**
     * デバッグ・ログを出力する
     *
     * @param mixed $message
     */
    protected function debugLog($message): void
    {
        if ($this->debug) {
            if (function_exists('\Debugbar')) {
                \Debugbar::info($message);
            }
        }
    }
}
