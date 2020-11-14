# laravel-nextengine

## Overview

ネクストエンジン API の Laravel プラグイン(非公式)です。
ネクストエンジン API に関してのリファレンスやコミュニティは [Developer Network](https://developer.next-engine.com/) をご利用ください。

## Overview

- ネクストエンジンAPI利用時の認証関連処理
- ネクストエンジンAPI利用時のリクエスト処理

## Install

composer でインストールしてください。

```bash
composer require laravel-nextengine
```

Laravel バージョン 8 以上を使う場合は、別途 laravel/legacy-factories をインストールしてください。

```bash
composer require laravel/legacy-factories
```

## 設定

`.env` に以下の項目を追加します。

ここに記述するのは、初期設定として利用するアカウントで、Seeding のときのみ、利用されます。

```dotenv
NEXT_ENGINE_USERNAME=(ネクストエンジンの管理者アカウント名)
NEXT_ENGINE_PASSWORD=(ネクストエンジンの管理者パスワード)
NEXT_ENGINE_CLIENT_ID=(ネクストエンジンの管理者 CLIENT_ID)
NEXT_ENGINE_CLIENT_SECRET=(ネクストエンジンの管理者 CLIENT_SECRET)
NEXT_ENGINE_REDIRECT_URI=(ネクストエンジンの管理者 REDIRECT_URI)
```

# 設定ファイルの出力

以下のコマンドで、

- `config/nextengine.php`
- `database/migrations/2020_01_01_000000_create_next_engine_apis_table.php`
- `database/factories/NextEngineApiFactory.php`

が出力されます。適宜編集してください。

```bash
php artisan vendor:publish --tag=nextengine
```

## 利用方法

OrderController から、受注伝票を取得する例

```php
<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function index()
    {
        $parameters = [];
        $orders = NextEngine::orderBaseSearch($parameters);        
        return view('orders.index', compact('orders'));
    }
}
```

## アクセストークンの更新

アクセストークンの更新のためのコマンドが利用可能になっています。

```bash
php artisan nextengine:refresh-tokens
```

### アクセストークンの更新の自動化

アクセストークンの更新を cron などの仕組みを利用して、自動化することも可能です。

`app/Console/Kernel.php` の `schedule`　メソッドを 以下のように編集します。

```php
<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('nextengine:refresh-tokens')->everyThirtyMinutes(); // <- 追加
    }
}
```

このスケジュルが実行されるために、cron に以下のタスクを追加します。

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

