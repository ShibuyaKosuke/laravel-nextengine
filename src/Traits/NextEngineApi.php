<?php

namespace ShibuyaKosuke\LaravelNextEngine\Traits;

use Illuminate\Database\Eloquent\Relations\HasOne;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi as NextEngineApiModel;

/**
 * Trait NextEngineApi
 * @package ShibuyaKosuke\LaravelNextEngine\Traits
 *
 * @property NextEngineApiModel nextEngineApi
 */
trait NextEngineApi
{
    /**
     * NextEngineApi
     *
     * @return HasOne
     */
    public function nextEngineApi(): HasOne
    {
        return $this->hasOne(NextEngineApiModel::class)
            ->withDefault(
                [
                    'pic_mail_address' => config('nextengine.pic_mail_address'),
                    'password' => config('nextengine.password'),
                    'client_id' => config('nextengine.account.client_id'),
                    'client_secret' => config('nextengine.account.client_secret'),
                    'redirect_uri' => config('nextengine.account.redirect_uri'),
                ]
            );
    }
}
