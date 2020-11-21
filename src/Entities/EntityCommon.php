<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities;

use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use ShibuyaKosuke\LaravelNextEngine\Contracts\UserInstanceContract;
use ShibuyaKosuke\LaravelNextEngine\Exceptions\NextEngineException;

/**
 * Class Common
 * @package ShibuyaKosuke\LaravelNextEngine\Entities
 */
abstract class EntityCommon implements EntityContract, EntityDownloadable
{
    /**
     * 対訳
     *
     * @var array
     */
    public static $translations = [];

    /**
     * 属性
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * 初期値
     *
     * @var array
     */
    protected $original = [];

    /**
     * Common constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->setAttributes($data);

        static::setTranslations();
    }

    /**
     * @param array $data
     * @return void
     */
    protected function setAttributes(array $data = []): void
    {
        foreach ($data as $name => $value) {
            if ($this->isDate($name)) {
                $value = new Carbon($value);
            }
            $this->original[$name] = $value;
        }

        $this->attributes = $this->original;
    }

    /**
     * プライマリーキー名を取得
     *
     * @return string|null
     */
    public function primaryKeyName(): ?string
    {
        if (property_exists(static::class, 'primaryKey')) {
            return static::$primaryKey;
        }
        return null;
    }

    /**
     * 対訳を取得する
     *
     * @return array
     */
    public static function getTranslations(): array
    {
        return static::$translations;
    }

    /**
     * 対訳ファイル読み込み
     *
     * @return void
     */
    protected static function setTranslations(): void
    {
        $file_name = Str::snake(class_basename(static::class));
        static::$translations = Lang::get('nextengine::' . $file_name);
    }

    /**
     * 配列をエンティティに変換
     *
     * @param array $response
     * @return array
     */
    public static function setData(array $response): array
    {
        if (!array_key_exists('data', $response)) {
            return $response;
        }

        $response['data'] = array_map(
            static function (array $row) {
                return new static($row);
            },
            $response['data']
        );

        return $response;
    }

    /**
     * 値を取得する
     *
     * @param string|null $name
     * @return array|mixed
     *
     * @synonym getAttributes()
     * @synonym toArray()
     */
    public function get(string $name = null)
    {
        if (is_null($name)) {
            return $this->attributes;
        }
        return $this->attributes[$name];
    }

    /**
     * 値を配列で取得する
     *
     * @return array
     *
     * @synonym get()
     * @synonym toArray()
     */
    public function getAttributes(): array
    {
        return $this->get();
    }

    /**
     * 値を配列で取得する
     *
     * @return array
     *
     * @synonym get()
     * @synonym getAttributes()
     */
    public function toArray(): array
    {
        return $this->get();
    }

    /**
     * data が二次元配列ではないとき
     *
     * @param array $response
     * @return array
     */
    public static function setDataRow(array $response): array
    {
        if (!array_key_exists('data', $response)) {
            return $response;
        }

        $response['data'] = new static($response['data']);

        return $response;
    }

    /**
     * @return string
     */
    public static function getPropertiesString(): string
    {
        return implode(',', static::$properties);
    }

    /**
     * プロパティのキー名をチェック
     *
     * @param string $name
     * @return bool
     * @throws NextEngineException
     */
    public function checkPropertyName(string $name): bool
    {
        if (!in_array($name, static::$properties, true)) {
            throw new NextEngineException('Invalid property name: ' . $name);
        }
        return true;
    }

    /**
     * XMLエレメントに変換する
     *
     * @param array $items
     * @return string
     */
    protected static function toXmlElement(array $items): string
    {
        $result = [];
        foreach ($items as $key => $value) {
            $result[] = sprintf('<%s>%s</%s>', $key, $value, $key);
        }
        return implode(PHP_EOL, $result);
    }

    /**
     * 日付型かどうか
     *
     * @param string $name
     * @return bool
     */
    protected function isDate(string $name): bool
    {
        return in_array($name, static::$dates, true);
    }

    /**
     * 変更のある項目を取得する
     *
     * @return array
     */
    public function getDirties(): array
    {
        // インスタンス作成時の値と、状態を比較
        return array_diff_assoc($this->attributes, $this->original);
    }

    /**
     * 項目が変更されているかを判定
     *
     * @return boolean
     */
    public function isDirty(): bool
    {
        // 変更された値があるかどうかを判定
        return count($this->getDirties()) > 0;
    }

    /**
     * @param string $name
     * @return mixed
     * @throws NextEngineException
     */
    public function __get(string $name)
    {
        $this->checkPropertyName($name);
        return $this->attributes[$name];
    }

    /**
     * @param string $name
     * @param mixed $value
     * @throws NextEngineException
     */
    public function __set(string $name, $value)
    {
        $this->checkPropertyName($name);
        $this->attributes[$name] = $value;
    }

    /**
     * @param string $name
     * @return bool
     * @throws NextEngineException
     */
    public function __isset(string $name): bool
    {
        $this->checkPropertyName($name);
        return isset($this->attributes[$name]);
    }
}
