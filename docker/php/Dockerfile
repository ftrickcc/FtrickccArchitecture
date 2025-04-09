# Stage 1: Instalar dependencias de Composer
FROM composer:latest AS composer_deps

COPY laravel/composer.* /app/
WORKDIR /app
RUN composer install --no-dev --optimize-autoloader

# Stage 2: Instalar dependencias de Node.js
FROM node:20 AS node_deps

WORKDIR /app

COPY laravel/package.json laravel/package-lock.json ./
RUN npm ci --production
COPY laravel/. ./
RUN npm run build

# Stage 3: Imagen final de producción
FROM php:8.3-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip libpng-dev libwebp-dev libonig-dev libxml2-dev libzip-dev \
    zip curl libfreetype6-dev libjpeg62-turbo-dev libicu-dev libsqlite3-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install \
    pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache pdo_sqlite && \
    docker-php-ext-enable opcache

# Crear usuario
RUN groupadd -g 1000 appuser && \
    useradd -u 1000 -g appuser -m appuser

# Copiar dependencias
COPY --from=composer_deps /app/vendor /var/www/vendor
COPY --from=node_deps /app/public/build /var/www/public/build
COPY laravel/. /var/www

# Copiar archivo php.ini personalizado (si tienes uno)
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Copiar el .env.example
COPY laravel/.env.example /var/www/.env.example

# Configurar directorio de trabajo
WORKDIR /var/www

# Permisos para Laravel
RUN mkdir -p storage bootstrap/cache && \
    chown -R appuser:appuser /var/www && \
    chmod -R 775 storage bootstrap/cache

# Opcional: si tienes APP_KEY y .env ya definidos (ej. en CI/CD), puedes cachear
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache || echo "Saltando cache por falta de .env válido"

USER appuser

EXPOSE 9000
CMD ["php-fpm"]
