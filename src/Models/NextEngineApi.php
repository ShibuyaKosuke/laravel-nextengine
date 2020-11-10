<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class NextEngineApi
 * @package ShibuyaKosuke\LaravelNextEngine\Models
 * @property string pic_mail_address
 * @property string password
 * @property string client_id
 * @property string client_secret
 * @property string uid
 * @property string state
 * @property string redirect_uri
 * @property string access_token
 * @property string refresh_token
 * @property Carbon access_token_end_date
 * @property Carbon refresh_token_end_date
 *
 * @method Builder refresh()
 */
class NextEngineApi extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'pic_mail_address',
        'password',
        'client_id',
        'client_secret',
        'uid',
        'state',
        'redirect_uri',
        'access_token',
        'refresh_token',
        'access_token_end_date',
        'refresh_token_end_date'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'access_token_end_date',
        'refresh_token_end_date'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'access_token_end_date' => 'datetime:Y-m-d H:i:d',
        'refresh_token_end_date' => 'datetime:Y-m-d H:i:d',
    ];

    /**
     * トークンリフレッシュが必要なもの
     */
    public function scopeRefresh(Builder $query)
    {
        return $query->whereRaw('access_token_end_date <= now()')
            ->whereRaw('refresh_token_end_date > now()');
    }

    /**
     * User リレーション
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }
}
