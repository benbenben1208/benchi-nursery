FROM php:7.4-fpm-alpine3.13

ENV TZ Asia/Tokyo
ENV COMPOSER_ALLOW_SUPERUSER 1

# RUN docker-php-ext-install pdo_mysql sockets \
#     &&  docker-php-ext-install bcmath pgsql pdo_pgsql

RUN apk update && \
    apk add --no-cache --virtual .php-builds oniguruma-dev postgresql-dev git zip unzip

# add php,apache-module
RUN docker-php-ext-install mbstring pdo pdo_pgsql && \
    docker-php-ext-enable mbstring
# php.conf php-fpm.conf
COPY .docker/api/conf/php.ini /usr/local/etc/php/php.ini
COPY .docker/api/conf/docker.conf /usr/local/etc/php-fpm.d/docker.conf
# install Composer

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

WORKDIR /api
COPY . /api/
COPY --chown=www-data:www-data . /api
RUN composer install --no-progress --optimize-autoloader --no-dev && \
    php artisan cache:clear \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear



