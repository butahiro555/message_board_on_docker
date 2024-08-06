FROM php:8.3-fpm

RUN apt-get update \
    && apt-get install -y \
    git \
    vim \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /src
COPY . /src
RUN chown -R www-data:www-data /src/storage