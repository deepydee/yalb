FROM php:8.2-apache-buster

ARG user
ARG uid

ENV PATH="./vendor/bin:$PATH" \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS=0 \
    PHP_OPCACHE_MAX_ACCELERATED_FILES=8000 \
    PHP_OPCACHE_MEMORY_CONSUMPTION=128


RUN docker-php-ext-install pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug opcache\
    && a2enmod rewrite

COPY . /var/www/html
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/config/php/conf.d/*.ini "${PHP_INI_DIR}/conf.d/"
COPY docker/start.sh /usr/local/bin/start
COPY docker/config/php/php.ini /usr/local/etc/php/php.ini

RUN mkdir -p /home/$user \
    && useradd -G www-data,root -u $uid -d /home/$user $user \
    && chown -R $user:$user /home/$user \
    && chown -R $user:$user "${PHP_INI_DIR}/conf.d/" \
    && chmod -R 755 storage/ \
    && chmod +x /usr/local/bin/start

RUN php artisan config:clear

USER $user

CMD ["/usr/local/bin/start"]
