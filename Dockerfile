FROM php:7.4-fpm

WORKDIR /usr/share/nginx/html

RUN set -xe && \
        docker-php-source extract && \
        apk add --no-cache --virtual .build-deps \
            autoconf \
            g++ \
            make \
        && \
        pecl install xdebug && \
        docker-php-ext-enable xdebug && \
        docker-php-source delete && \
        apk del .build-deps && \
        php -v && \
        php -m

COPY docker-xdebug-* /usr/local/bin/