# Use an official PHP image with Apache
FROM php:8.2-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libmcrypt-dev \
    libicu-dev \
    libxslt-dev \
    mariadb-client \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Copy all WordPress files to Apache web root
COPY . /var/www/html/

# Set ownership and permissions
RUN chown -R www-data:www-data /var/www/html

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80
