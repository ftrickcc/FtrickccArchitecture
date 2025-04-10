# Stage 1: Composer dependencies
FROM composer:2 AS composer_deps
WORKDIR /app
COPY laravel/composer.json laravel/composer.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist --optimize-autoloader
COPY laravel/. .

# Stage 2: Node dependencies
FROM node:20 AS node_deps
WORKDIR /app
COPY laravel/package.json laravel/package-lock.json ./
RUN npm install --legacy-peer-deps
COPY laravel/resources ./resources
COPY laravel/vite.config.js ./
RUN npm run build

# Stage 3: PHP build
FROM php:8.3-fpm AS php_build
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip mbstring exif pcntl bcmath gd

# Stage 4: Final image
FROM php:8.3-fpm AS stage-2

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite

# Crear usuario no root
RUN groupadd -g 1000 appuser && useradd -u 1000 -g appuser -m appuser

# Copiar dependencias de composer y node
COPY --from=composer_deps /app/vendor /var/www/vendor
COPY --from=node_deps /app/public/build /var/www/public/build

# Copiar código de la aplicación
COPY laravel/. /var/www

# Copiar configuración de PHP
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Crear carpetas necesarias y establecer permisos correctos
RUN mkdir -p /var/www/storage/framework/{cache,sessions,views} /var/www/bootstrap/cache && \
    chown -R appuser:appuser /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache && \
    if [ ! -f /var/www/.env ]; then cp /var/www/.env.example /var/www/.env; fi && \
    chown appuser:appuser /var/www/.env && \
    chmod 664 /var/www/.env

WORKDIR /var/www

# Cambiar a usuario no root
USER appuser

# Ejecutar comandos Artisan
RUN php artisan key:generate --force && \
    composer dump-autoload --optimize && \
    php artisan storage:link && \
    php artisan package:discover --ansi && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Exponer puerto y definir comando por defecto
EXPOSE 9000
CMD ["php-fpm"]
