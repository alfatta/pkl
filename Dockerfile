FROM php:5.4-apache
WORKDIR /var/www/html
RUN docker-php-ext-install pdo pdo_mysql