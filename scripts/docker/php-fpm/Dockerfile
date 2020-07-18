FROM php:7.4-fpm-alpine

ARG env_database_url

ENV DATABASE_URL $env_database_url

RUN apk update && apk --no-cache add postgresql-dev

RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug-2.9.6 \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo pdo_pgsql

COPY . /var/www/html

RUN chown -Rf www-data:www-data /var/www/html

RUN rm -Rf /var/www/html/var/logs/*.log

USER www-data

RUN cd /var/www/html && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');"

RUN php /var/www/html/composer.phar install
