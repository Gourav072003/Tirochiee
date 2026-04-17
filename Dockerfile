FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project files
COPY . .

# Install dependencies (IMPORTANT FIX)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Laravel cleanup
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

CMD ["php-fpm"]
