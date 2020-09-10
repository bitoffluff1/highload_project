FROM php:7.4-fpm
RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN apt-get install -y libz-dev libmemcached-dev
RUN pecl install memcached
RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini
