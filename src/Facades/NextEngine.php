<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine\Facades;

use Illuminate\Support\Facades\Facade;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

/**
 * Class NextEngine
 * @package ShibuyaKosuke\LaravelNextEngine\Facades
 *
 * @method static array company()
 * @method static array execute(string $path, array $params = [], string $redirect_uri = null)
 * @method static array getAccessToken()
 * @method static integer getWaitFlag()
 * @method static NextEngine login(string $redirect_uri = null)
 * @method static array|string loginForCli(string $redirect_uri = null)
 * @method static array loginCompany()
 * @method static array loginUser()
 * @method static NextEngine setAccount(NextEngineApi $nextEngineApi)
 * @extends ShibuyaKosuke\LaravelNextEngine\NextEngine
 */
class NextEngine extends Facade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor(): string
    {
        return 'nextengine.client';
    }
}
