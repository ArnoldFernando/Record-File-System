# syntax=docker/dockerfile:1

# Stage 1: Composer Dependencies
FROM composer:lts AS deps

WORKDIR /app

# Copy all files into the container
COPY . .

# Install PHP dependencies using Composer
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

################################################################################

# Stage 2: Final Image with Apache and PHP
FROM php:8.2-apache AS final

# Install required PHP extensions and utilities
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    vim \
    git \
    libonig-dev \
    libxml2-dev \
    apache2 \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mysqli zip bcmath

# Enable Apache mod_rewrite for Laravel's pretty URLs
RUN a2enmod rewrite

# Set the Apache document root to the Laravel public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy application files from the first stage
COPY --from=deps /app /var/www/html

# Set appropriate permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]

