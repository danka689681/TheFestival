FROM php:7.4-cli

RUN docker-php-ext-install pdo pdo_mysql 

# RUN pecl install xdebug && docker-php-ext-enable xdebug
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN apt-get update && apt-get install -y git zip unzip 
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
COPY ./app/composer.* ./
RUN composer install 
COPY ./app .
RUN composer dump-autoload --optimize