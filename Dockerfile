FROM php:8.2-apache

# PHP kengaytmalari
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Apache mod_rewrite
RUN a2enmod rewrite

# Loyihani ichga ko'chirish
COPY . /var/www/html/

# Ruxsatlar
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
