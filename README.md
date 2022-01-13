# プロダクト内容

RESE という飲食店サービスです。
主な機能は、以下です。

* 地域やカテゴリ（居酒屋、イタリアンなど）で分類された飲食店を一覧表示
* 飲食店の詳細情報の確認
* ユーザ登録
* 飲食店のお気に入り追加、削除
* 飲食店のレビュー
* 飲食店の予約と予約変更
* 飲食店オーナーによる飲食店の追加、削除などや予約状況の確認
* サイト管理者によるユーザ権限などの管理

# 環境構築方法

ターミナルもしくはソース管理ツールから`git clone` を実施します。

```
$ git clone  https://github.com/micci-micci/rese.git
$ cd rese
```


ルートディレクトリ配下に`.env`ファイルを作成します。
以下の項目に任意で入力する。

```
WEB_PORT=
DB_PORT=3306
DB_HOST=
DB_NAME=
DB_USER=
DB_PASSWORD=
```

`docker-compose`コマンドでビルドし、起動します。

```
$ docker-compose up -d --build
```

立ち上がると以下の出力がされたら成功です。。

```
Recreating db         ... done
Recreating rese_app_1 ... done
Recreating rese_web_1 ... done
```

Docker 内に入るために以下のコマンドを実行します。

```
$ docker compose exec app bash
```

`vendor`作成するため、以下のコマンドを実行します。

```
$ composer update
$ composer install
```

以下の内容で`.env`を作成します。

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

### DB 情報を記述
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

### AWS のクレデンシャル情報とバケット情報を記述
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false
```

次にアプリケーションキーの初期化を実施します。

```
$ php artisan key:generate
```

マイグレートするため、以下のコマンドを実行します。

```
$ php artisan migrate:fresh --seed
```

ブラウザで`localhost:{PORT_NUMBER}`を入力し、サイトが開くのを確認したら完了です。
