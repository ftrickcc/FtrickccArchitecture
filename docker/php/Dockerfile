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
FROM php:8.3-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y --no-install-recommends \
      curl git unzip zip \
      libpng-dev libwebp-dev libonig-dev libxml2-dev libzip-dev \
      libfreetype6-dev libjpeg62-turbo-dev libicu-dev libsqlite3-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configurar y habilitar extensiones PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install \
      pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache pdo_sqlite && \
    docker-php-ext-enable opcache

# Crear usuario no root
RUN groupadd -g 1000 appuser && \
    useradd -u 1000 -g appuser -m appuser

# Copiar dependencias instaladas con Composer y Node.js
COPY --from=composer_deps /app/vendor /var/www/vendor
COPY --from=node_deps /app/public/build /var/www/public/build

# Copiar el resto del código de Laravel
# Esto copia todos los archivos, incluyendo .env.example (recordar que .env no se sube)
COPY laravel/ /var/www

# Si no existe .env, crearlo a partir de .env.example
RUN if [ ! -f /var/www/.env ]; then cp /var/www/.env.example /var/www/.env; fi \
    && mkdir -p /var/www/storage/framework/{cache,sessions,views} /var/www/bootstrap/cache \
    && chown -R appuser:appuser /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Copiar la configuración personalizada de PHP (se usará si no se monta desde el host)
COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# Establecer directorio de trabajo
WORKDIR /var/www

# Cambiar a usuario no root
USER appuser

# Ejecutar comandos de preparación de Laravel
RUN php artisan key:generate --force && \
    composer dump-autoload --optimize && \
    php artisan storage:link && \
    php artisan package:discover --ansi && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 9000
CMD ["php-fpm"]
