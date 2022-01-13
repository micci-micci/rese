# 環境構築方法

ターミナルもしくはソース管理ツールから`git clone` を実施する。

```
$ git clone  https://github.com/micci-micci/rese.git
$ cd rese
```


ルートディレクトリ配下に`.env`ファイルを作成する。
以下の項目に任意で入力する。

```
WEB_PORT=
DB_PORT=3306
DB_HOST=
DB_NAME=
DB_USER=
DB_PASSWORD=
```

`docker-compose`コマンドでビルドし、起動する。

```
$ docker-compose up -d --build
```

立ち上がると以下の出力がされる。

```
Recreating db         ... done
Recreating rese_app_1 ... done
Recreating rese_web_1 ... done
```

Docker 内に入るために以下のコマンドを実行する。

```
$ docker compose exec app bash
```

`vendor`作成するため、以下のコマンドを実行する。

```
$ composer update
$ composer install
```

以下の内容で`.env`を作成する。

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

次にアプリケーションキーの初期化を実施する。

```
$ php artisan key:generate
```

マイグレートするため、以下のコマンドを実行する。

```
$ php artisan migrate:fresh --seed
```

ブラウザで`localhost:{PORT_NUMBER}`を入力し、サイトが開くのを確認したら完了です。
