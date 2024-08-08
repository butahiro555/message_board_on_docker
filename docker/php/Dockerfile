FROM php:8.3-fpm

# 必要なパッケージのインストールとクリーンアップ(vimは任意)
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

# storageディレクトリを作成しておく
RUN mkdir -p /var/www/html/storage

# コンテナ内の作業ディレクトリにホストマシンのファイルをコピーする
# 最初のドットで、 コンテナのビルドコンテキスト内のすべてのファイルをコピーする。
# 二番目のドットで、 コンテナ内の作業ディレクトリにファイルをコピーする。

COPY . .

# 権限設定を付与する
RUN chown -R www-data:www-data /var/www/html/storage
