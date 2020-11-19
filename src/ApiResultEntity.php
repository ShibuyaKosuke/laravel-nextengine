<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Boolean;
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
class ApiResultEntity
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
    protected $serialized_data;

    /**
     * @var string
     */
    protected $class_name;

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
        if (!is_null($class_name)) {
            $response = call_user_func([$class_name, 'setData'], $response);
            $this->translations = call_user_func_array([$class_name, 'getTranslations'], []);
        }

        $this->class_name = $class_name;

        foreach ($response as $name => $value) {
            $this->$name = $value;
        }

        // キャッシュ用にレスポンスを保持する
        $this->serialized_data = serialize($this->data);

        // session_key を生成
        $this->session_key = hash('sha256', $this->serialized_data);

        $this->request->session()->put($this->session_key, $this->serialized_data);

        return $this;
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
