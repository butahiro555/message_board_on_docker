FROM php:8.3-fpm

# 必要なパッケージのインストールとクリーンアップ
RUN apt-get update && \
    apt-get install -y \
    git \
    vim \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリの設定
WORKDIR /var/www/html

# Laravel プロジェクトの作成
RUN composer create-project --prefer-dist laravel/laravel . "10.*"

# 必要なディレクトリの作成と権限設定
RUN mkdir -p /var/www/html/storage && \
    chown -R www-data:www-data /var/www/html/storage

# コンテナ内の /var/www/html ディレクトリに init.sh をコピー
COPY init.sh /var/www/html/init.sh

# スクリプトに実行権限を付与
RUN chmod +x /var/www/html/init.sh
