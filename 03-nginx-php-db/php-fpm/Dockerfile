FROM php:8.3-fpm-alpine

RUN apk add --no-cache postgresql-libs \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS postgresql-dev \
    && docker-php-ext-install -j"$(nproc)" pdo_mysql pdo_pgsql \
    && apk del .build-deps

RUN apk add --no-cache --virtual .redis-build-deps $PHPIZE_DEPS \
    && pecl install redis-6.2.0 </dev/null \
    && docker-php-ext-enable redis \
    && apk del .redis-build-deps

WORKDIR /var/www/html
COPY app/ /var/www/html/
COPY php-fpm/conf/php.ini /usr/local/etc/php/conf.d/zz-lab.ini
