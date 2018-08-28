FROM php:7.2-apache

MAINTAINER Alugbin LordRahl Abiodun Olutola <alugbin.abiodun@gmail.com>

COPY ./ /var/www/html

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

#Install PHP plugins
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd \
        --with-freetype-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql

RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite

#Lets clean the docker application.
RUN cp .env.example .env
RUN php artisan key:generate
RUN php artisan config:cache
#RUN php artisan migrate:fresh --seed