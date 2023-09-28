FROM php:8.1-apache as php

RUN apt-get update -y && apt-get install -y libmcrypt-dev

# Installs composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo mbstring

WORKDIR /var/www/
COPY . /var/www/

RUN composer install

EXPOSE 8000
ENV PORT=8000
CMD php artisan serve --host=0.0.0.0 --port=8000
# ENTRYPOINT [ "docker/entrypoint.sh" ]
