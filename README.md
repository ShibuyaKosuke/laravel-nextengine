# laravel-nextengine

## Overview

ネクストエンジン API の Laravel プラグイン です。
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

