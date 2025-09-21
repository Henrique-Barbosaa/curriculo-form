FROM php:8.3-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    bash \
    curl \
    libpng-dev \
    libzip-dev \
    zlib1g-dev \
    libpq-dev

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs
    
RUN docker-php-ext-install gd zip pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]

CMD ["php-fpm"]