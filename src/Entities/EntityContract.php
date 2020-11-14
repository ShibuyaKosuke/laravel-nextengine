<?php

namespace ShibuyaKosuke\LaravelNextEngine\Entities;

interface EntityContract
{
    /**
     * 配列をエンティティに変換
     *
     * @param array $response
     * @return array
     */
    public static function setData(array $response): array;
}
