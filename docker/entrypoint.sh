#!/bin/bash
set -e

cd /var/www

# 必要なディレクトリを作成
mkdir -p \
    storage/framework/cache/data \
    storage/framework/views \
    storage/framework/sessions \
    bootstrap/cache

# 権限の設定
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Laravel キャッシュのクリアと再生成（エラーが出ても止まらないように）
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

php artisan migrate:fresh --seed --force || true

# PHP-FPM をフォアグラウンドで起動
exec php-fpm
