<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

$factory->define(NextEngineApi::class, function (Faker $faker) {
    return [
        'pic_mail_address' => config('nextengine.pic_mail_address'),
        'password' => config('nextengine.password'),
        'client_id' => config('nextengine.account.client_id'),
        'client_secret' => config('nextengine.account.client_secret'),
        'uid' => null,
        'state' => null,
        'redirect_uri' => config('nextengine.account.redirect_uri'),
        'access_token' => null,
        'refresh_token' => null,
        'access_token_end_date' => null,
        'refresh_token_end_date' => null
    ];
});
