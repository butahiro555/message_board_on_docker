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
WORKDIR /src

# アプリケーションコードのコピー
COPY . /src

ADD . /src/storage

# ストレージディレクトリの権限設定
RUN chown -R www-data:www-data /src/storage
