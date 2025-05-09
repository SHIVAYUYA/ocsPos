FROM php:8.2-fpm

# 必要なパッケージと拡張モジュールのインストール
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    libmcrypt-dev \
    libicu-dev \
    libpq-dev \
    default-mysql-client \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Composer のインストール（マルチステージビルドで composer を取り込み）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# アプリケーションコードのコピー（後でvolumeで上書きされる可能性あり）
COPY ./src /var/www

# 作業ディレクトリ設定
WORKDIR /var/www

# Laravelのパーミッション修正（vendorは作らない）
RUN mkdir -p storage/framework/cache/data && \
    chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# entrypoint.sh をコピーして実行可能に
COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# PHP-FPM をフォアグラウンドで起動
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
