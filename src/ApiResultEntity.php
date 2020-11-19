<?php

namespace ShibuyaKosuke\LaravelNextEngine;

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Boolean;
use ShibuyaKosuke\LaravelNextEngine\Entities\EntityContract;

/**
 * Class ApiResultEntity
 * @package ShibuyaKosuke\LaravelNextEngine
 *
 * @property boolean result
 * @property integer count
 * @property array|EntityContract[] data
 * @property string access_token
 * @property Carbon access_token_end_date
 * @property string refresh_token
 * @property Carbon refresh_token_end_date
 */
class ApiResultEntity
{
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
    protected $transtarions = [];

    /**
     * データ
     *
     * @var array|EntityContract[]
     */
    protected $data;

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
     * @param string $class_name
     * @param array $response
     */
    public function __construct(string $class_name = null, array $response = [])
    {
        if (!is_null($class_name)) {
            $response = call_user_func([$class_name, 'setData'], $response);
            $this->transtarions = call_user_func_array([$class_name, 'getTranslations'], []);
        }

        foreach ($response as $name => $value) {
            $this->$name = $value;
        }
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
