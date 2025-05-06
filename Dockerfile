FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    libcurl4-openssl-dev \
    libmcrypt-dev \
    libxslt-dev \
    git \
    mariadb-client \
    && docker-php-ext-install pdo pdo_mysql mbstring zip xml gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
