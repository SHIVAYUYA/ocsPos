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

# Composer のインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel のソースコードをコピー
COPY . /var/www

# 作業ディレクトリ設定
WORKDIR /var/www

# Composer依存関係のインストール
RUN composer install --no-interaction --prefer-dist
