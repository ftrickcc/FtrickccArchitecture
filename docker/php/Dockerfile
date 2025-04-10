#############################################
# Stage 1: Instalar dependencias de Composer
#############################################
FROM composer:latest AS composer_deps

COPY laravel/composer.* /app/
COPY laravel/.env.example /app/.env.example
WORKDIR /app

RUN composer install --no-dev --optimize-autoloader --no-scripts

#############################################
# Stage 2: Instalar dependencias de Node.js y construir assets
#############################################
FROM node:20 AS node_deps
WORKDIR /app

COPY laravel/package.json laravel/package-lock.json ./
RUN npm ci

COPY laravel/ ./
RUN npm run build

#############################################
# Stage 3: Imagen final con PHP-FPM + NGINX
#############################################
FROM php:8.3-fpm

# Instalar dependencias del sistema y NGINX
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx curl git unzip zip \
    libpng-dev libwebp-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libicu-dev libsqlite3-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install \
      pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache pdo_sqlite && \
    docker-php-ext-enable opcache

# Crear usuario no root
RUN groupadd -g 1000 appuser && \
    useradd -u 1000 -g appuser -m appuser

# Copiar dependencias de Composer y assets compilados
COPY --from=composer_deps /app/vendor /var/www/vendor
COPY --from=node_deps /app/public/build /var/www/public/build

# Copiar el resto del código de Laravel
COPY laravel/ /var/www

# Copiar Composer binario
COPY --from=composer_deps /usr/bin/composer /usr/bin/composer

# Crear .env si no existe y dar permisos
RUN if [ ! -f /var/www/.env ]; then cp /var/www/.env.example /var/www/.env; fi \
    && mkdir -p /var/www/storage/framework/{cache,sessions,views} /var/www/bootstrap/cache \
    && chown -R appuser:appuser /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Copiar configuración de PHP y NGINX
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Establecer directorio de trabajo
WORKDIR /var/www
USER appuser

# Ejecutar comandos de preparación de Laravel
RUN php artisan key:generate --force && \
    composer dump-autoload --optimize && \
    php artisan storage:link && \
    php artisan package:discover --ansi && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Exponer puertos: NGINX (80)
EXPOSE 80

# Lanzar PHP-FPM en segundo plano y luego NGINX
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
