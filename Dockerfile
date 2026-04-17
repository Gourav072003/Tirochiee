FROM php:7.4-apache

# Install system dependencies (added libonig-dev for mbstring support)
RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev zip libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install dependencies 
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Set critical permissions so Laravel can write to storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Change Apache document root to Laravel's public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Laravel cache cleanup
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Expose port 80 for Render
EXPOSE 80
