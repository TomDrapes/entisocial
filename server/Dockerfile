FROM php:7.2-fpm

# Set working directory
WORKDIR /var/www/laravel

# Install dependencies
RUN apt-get update && apt-get install -y curl

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

