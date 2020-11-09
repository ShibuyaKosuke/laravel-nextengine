<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine\Services;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpClient
 * @package ShibuyaKosuke\LaravelNextEngine\Services
 */
class HttpClient
{
    /**
     * @var GuzzleClient
     */
    private $client;

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
        $this->client = new GuzzleClient();
    }

    /**
     * GET通信（同期処理）
     *
     * @param string $url
     * @param array $params
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function get(string $url, array $params = []): ResponseInterface
    {
        return $this->client->get($url, $params);
    }

    /**
     * POST通信（同期処理）
     *
     * @param string $url
     * @param array $params
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function post(string $url, array $params = []): ResponseInterface
    {
        $options = [
            'form_params' => $params
        ];
        return $this->client->post($url, $options);
    }

    /**
     * POST通信（非同期処理）
     *
     * @param string $url
     * @param array $params
     * @return PromiseInterface
     */
    public function postAsync(string $url, array $params = []): PromiseInterface
    {
        $options = [
            'form_params' => $params
        ];
        return $this->client->postAsync($url, $options);
    }
}
