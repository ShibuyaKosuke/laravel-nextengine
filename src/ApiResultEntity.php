<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;
use ShibuyaKosuke\LaravelNextEngine\Contracts\SessionResponseContract;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityContract;

/**
 * Class ApiResultEntity
 * @package ShibuyaKosuke\LaravelNextEngine
 *
 * @property boolean result
 * @property integer count
 * @property array translations
 * @property array|EntityContract[] data
 * @property string access_token
 * @property Carbon access_token_end_date
 * @property string refresh_token
 * @property Carbon refresh_token_end_date
 */
class ApiResultEntity implements SessionResponseContract
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * 結果
     *
     * @var Boolean
     */
    protected $result;

    /**
     * 件数
     *
     * @var integer
     */
    protected $count;

    /**
     * 対訳
     *
     * @var array
     */
    protected $translations = [];

    /**
     * データ
     *
     * @var array|EntityContract[]
     */
    protected $data;

    /**
     * 線形化データ
     *
     * @var
     */
    protected $serialized_object;

    /**
     * @var string
     */
    protected $session_key;

    /**
     * アクセストークン
     *
     * @var string
     */
    protected $access_token;

    /**
     * アクセストークン期限
     *
     * @var Carbon
     */
    protected $access_token_end_date;

    /**
     * リフレッシュトークン
     *
     * @var string
     */
    protected $refresh_token;

    /**
     * リフレッシュトークン期限
     *
     * @var Carbon
     */
    protected $refresh_token_end_date;

    /**
     * ApiResultEntity constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param array $response
     * @param string|null $class_name
     * @return ApiResultEntity
     */
    public function set(array $response, string $class_name = null): self
    {
        // レスポンス内のデータをエンティティに変換する
        $response = $this->convertArrayToEntity($response, $class_name);

        // データをセットする
        $this->setData($response);

        // データをセッションに保存する
        $this->setSessionData();

        return $this;
    }

    /**
     * レスポンス内のデータをエンティティに変換する
     *
     * @param array $response
     * @param string $class_name
     * @return array
     */
    protected function convertArrayToEntity(array $response, string $class_name): array
    {
        if (!is_null($class_name)) {
            $response = call_user_func([$class_name, 'setData'], $response);
        }
        return $response;
    }

    /**
     * 対訳をセットする
     *
     * @param string $class_name
     * @return void
     */
    protected function setTranslations(string $class_name): void
    {
        if (!is_null($class_name)) {
            $this->translations = call_user_func_array([$class_name, 'getTranslations'], []);
        }
    }

    /**
     * データをセットする
     *
     * @param array $response
     * @return void
     */
    protected function setData(array $response): void
    {
        foreach ($response as $name => $value) {
            $this->$name = $value;
        }
    }

    /**
     * データをセッションに保存する
     */
    public function setSessionData(): void
    {
        // キャッシュ用にレスポンスを保持する
        $this->serialized_object = serialize($this);

        // session_key を生成
        $this->session_key = hash('sha256', $this->serialized_object);

        $this->request->session()->put($this->session_key, $this->serialized_object);
    }

    /**
     * セッション保存用のキーを取得
     *
     * @return string
     */
    public function getSessionKey(): string
    {
        return $this->session_key;
    }

    /**
     * セッションに保存したデータを取得する
     *
     * @param string $key セッションキー
     * @return mixed
     */
    public static function getSessionData(string $key)
    {
        /** @noinspection UnserializeExploitsInspection */
        return unserialize(session($key));
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->$name;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return isset($this->$name);
    }
}
