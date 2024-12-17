FROM php:5.4-apache
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql
