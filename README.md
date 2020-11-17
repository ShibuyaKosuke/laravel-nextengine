# laravel-nextengine

## Overview

ネクストエンジン API の Laravel プラグイン(非公式)です。
ネクストエンジン API に関してのリファレンスやコミュニティは [Developer Network](https://developer.next-engine.com/) をご利用ください。

## Overview

- ネクストエンジンAPI利用時の認証関連処理
- ネクストエンジンAPI利用時のリクエスト処理

### 実装済み機能

以下のAPIについて、`dev-main` で利用可能です。

|  | 検索 | 件数取得 | 更新 |
|:-----|:----:|:----:|:----:|
|受注伝票| OK | OK | OK |
|受注オプション| OK | OK | - |
|受注詳細| OK | OK | - |

|  | 検索 | 件数取得 | アップロード |
|:-----|:----:|:----:|:----:|
|商品マスタ| OK | OK | OK |
|商品タグ| OK | OK | - |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|メールタグ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|在庫マスタ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|区分け在庫マスタ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|仕入先マスタ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|仕入伝票| OK | OK |
|仕入明細| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|発注伝票| OK | OK |
|発注明細| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|卸先マスタ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|在庫入出庫履歴| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|商品ページ（基本）| OK | OK |
|商品ページ（基本-項目選択肢又はオプション）| OK | OK |

|  | 検索 | 件数取得 | 作成 | 更新 | 受注情報取り込み用メールアドレス取得 |
|:-----|:----:|:----:|:----:|:----:|:----:|
|店舗マスタ| OK | OK | OK | OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|商品画像| OK | OK |
|商品画像分類タグ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|画像分類タグ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|商品カテゴリ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|商品別卸先マスタ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|モール| OK | OK |
|モールカテゴリ| OK | OK |

|  | 検索 | 件数取得 |
|:-----|:----:|:----:|
|アップロードキュー| OK | OK |

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

### User モデルへのリレーション追加

以下のように、`NextEngineApi` トレイトを追加すると、`hasOne` で `NextEngineApi` モデルへのリレーションを追加できます。

```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use ShibuyaKosuke\LaravelNextEngine\Traits\NextEngineApi;

class User extends Authenticatable
{
    use NextEngineApi; // 追加
}
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
        $receiveOrder = NextEngine::receiveOrderBaseSearch($parameters);        
        return view('orders.index', compact('receiveOrder'));
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

