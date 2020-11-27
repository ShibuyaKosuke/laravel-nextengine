<?php

namespace ShibuyaKosuke\LaravelNextEngine\Services;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface HttpClientInterface
 * @package ShibuyaKosuke\LaravelNextEngine\Services
 */
interface HttpClientInterface
{
    /**
     * POST通信（同期処理）
     *
     * @param string $url
     * @param array $params
     * @return ResponseInterface
     */
    public function post(string $url, array $params = []): ResponseInterface;
}
