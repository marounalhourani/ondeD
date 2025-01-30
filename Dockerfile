# First stage: Install Composer and dependencies
FROM php:8.2-fpm as build

# Set working directory
WORKDIR /var/www

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpq-dev libonig-dev libxml2-dev \
    sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite bcmath mbstring intl \
    && apt-get clean

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Set permissions for directories
RUN chmod -R 775 storage bootstrap/cache

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Second stage: Use the built image to serve the app
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Copy dependencies from the first stage
COPY --from=build /var/www /var/www

# Set permissions for directories
RUN chmod -R 775 storage bootstrap/cache

# Optionally, set a non-root user (for better security)
RUN useradd -ms /bin/bash appuser
USER appuser

# Expose port 9000 (default for PHP-FPM)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
