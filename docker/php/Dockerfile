#############################################
# Stage 1: Instalar dependencias de Composer
#############################################
FROM composer:latest AS composer_deps

# Copia archivos de Composer y la plantilla de .env
COPY laravel/composer.* /app/
COPY laravel/.env.example /app/.env.example
WORKDIR /app

# Instalar dependencias sin dependencias de desarrollo
RUN composer install --no-dev --optimize-autoloader --no-scripts

#############################################
# Stage 2: Instalar dependencias de Node.js y construir assets
#############################################
FROM node:20 AS node_deps
WORKDIR /app

# Copiar package.json y package-lock.json e instalar dependencias
COPY laravel/package.json laravel/package-lock.json ./
RUN npm ci

# Copiar resto de los archivos y construir los assets
COPY laravel/ ./
RUN npm run build

#############################################
# Stage 3: Imagen final de producción (PHP-FPM)
#############################################
FROM php:8.3-fpm AS base

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    nginx curl git unzip zip \
    libpng-dev libwebp-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libicu-dev libsqlite3-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install \
    pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache pdo_sqlite

# Copiar archivos Laravel
COPY laravel /var/www
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan storage:link && \
    php artisan key:generate --force

# Crear usuario
RUN groupadd -g 1000 appuser && \
    useradd -u 1000 -g appuser -m appuser && \
    chown -R appuser:appuser /var/www

USER appuser

# Copiar config personalizada de nginx y php
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

EXPOSE 80
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
