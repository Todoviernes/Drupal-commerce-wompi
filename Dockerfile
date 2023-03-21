FROM php:8.0-apache

RUN apt-get update && \
    apt-get install -y \
        libicu-dev \
        libpng-dev \
        libjpeg-dev \
        libzip-dev \
        git \
        unzip \
        curl \
        && docker-php-ext-configure gd --with-jpeg \
        && docker-php-ext-install -j$(nproc) \
            intl \
            gd \
            opcache \
            pdo_mysql \
            zip \
            bcmath

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite
