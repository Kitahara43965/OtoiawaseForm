
## アプリケーション名

OtoiawaseForm

## 環境構築

(イ) ローカルリポジトリの設定
ローカルリポジトリを作成するディレクトリにおいてコマンドライン上で
$ git clone git@github.com:Kitahara43965/OtoiawaseForm.git
$ mv OtoiawaseForm (ローカルリポジトリ名)
とすればリモートリポジトリのクローンが生成され、所望のローカルリポジトリ名のディレクトリが得られます。

(ロ) dockerの設定
ローカルリポジトリで
dockerが起動していることを確認した上で
$ docker-compose up -d --build
とします。
$ cd docker/php
$ docker-compose exec php bash
でphpコンテナ内に入り、
$ composer install
でcomposerをインストールします。

(ハ) webアプリの立ち上げ
(ハ-1) phpコンテナ上で
cp .env.example .env
と入力し、.envファイルを複製します。
(ハ-2) .envファイル(11行目以降)では
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
とします。
(ハ-3) phpコンテナ上で
php artisan key:generate
php artisan migrate
php artisan db:seed
と入力します。

以上でwebアプリが起動します。

## 使用技術(実行環境)
- 例) Laravel 8.83.8

## ER図
< - - - 作成したER図の画像 - - - >

## URL
- 例) 開発環境：http://localhost/


