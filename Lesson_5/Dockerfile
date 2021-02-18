FROM php:7.4-fpm

#Install redis
RUN pecl install redis-5.1.1 \
    && pecl install xdebug-2.8.1 \
    && docker-php-ext-enable redis xdebug

CMD ["php-fpm"]
