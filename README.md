
## アプリケーション名

OtoiawaseForm

## 環境構築

(イ) ローカルリポジトリの設定<br>
ローカルリポジトリを作成するディレクトリにおいてコマンドライン上で<br>
$ git clone git@github.com:Kitahara43965/OtoiawaseForm.git<br>
$ mv OtoiawaseForm (ローカルリポジトリ名)<br>
とすればリモートリポジトリのクローンが生成され、所望のローカルリポジトリ名のディレクトリが得られます。<br>
<br>
(ロ) dockerの設定<br>
ローカルリポジトリで<br>
dockerアプリが起動していることを確認した上で<br>
$ docker-compose up -d --build<br>
とします。<br>
$ cd docker/php<br>
$ docker-compose exec php bash<br>
でphpコンテナ内に入り、<br>
$ composer install<br>
でcomposerをインストールします。<br>
<br>
(ハ) webアプリの立ち上げ<br>
(ハ-1) phpコンテナ上で<br>
cp .env.example .env<br>
と入力し、.envファイルを複製します。<br>
(ハ-2) .envファイル(11行目以降)では<br>
DB_HOST=mysql<br>
DB_PORT=3306<br>
DB_DATABASE=laravel_db<br>
DB_USERNAME=laravel_user<br>
DB_PASSWORD=laravel_pass<br>
とします。<br>
(ハ-3) phpコンテナ上で<br>
php artisan key:generate<br>
php artisan migrate:fresh (マイグレーション)<br>
php artisan db:seed (シーディング)<br>
と入力します。<br>
<br>
以上でwebアプリが起動します。<br>
<br>
## 使用技術(実行環境)<br>
Laravel 8.83.8<br>
<br>
## ER図<br>
< - - - 作成したER図の画像 - - - ><br>
<br>
## URL<br>
- 例) 開発環境：http://localhost/<br>


