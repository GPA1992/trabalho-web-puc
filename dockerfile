FROM php:8.1-apache

WORKDIR /var/www/html/pokemon

RUN docker-php-ext-install mysqli