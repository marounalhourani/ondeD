# Use an official PHP image with required extensions
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpq-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_sqlite bcmath mbstring intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Set permissions for directories
RUN chmod -R 775 storage bootstrap/cache

# Optionally, set a non-root user (for better security)
RUN useradd -ms /bin/bash appuser
USER appuser

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Expose port 9000 (default for PHP-FPM)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]


RUN apt-get update && apt-get install -y \
    zip unzip git curl libpq-dev libonig-dev sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite
