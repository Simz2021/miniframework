FROM php:8.1.1-apache

RUN apt-get update && \
    apt-get install -y \
    curl \
    git \
    libmcrypt-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    zip && \
    docker-php-ext-install \
    gd \
    mysqli \
    pdo \
    pdo_mysql \
    soap \
    zip 

RUN docker-php-ext-enable mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html