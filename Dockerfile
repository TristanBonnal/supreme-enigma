FROM php:8.1.12-apache

# Extensions php
RUN docker-php-ext-install pdo pdo_mysql

# Intall de composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR  /var/www/html