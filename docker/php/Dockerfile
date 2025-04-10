# Stage 1: Instalar dependencias de Composer
FROM composer:latest AS composer_deps
COPY laravel/composer.* /app/
COPY laravel/.env.example /app/.env
WORKDIR /app
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Stage 2: Instalar dependencias de Node.js
FROM node:20 AS node_deps
WORKDIR /app
COPY laravel/package.json laravel/package-lock.json ./
RUN npm ci
COPY laravel/. ./
RUN npm run build

# Stage 3: Imagen final de producción
FROM php:8.3-fpm

# ... (mantén las instalaciones de paquetes y extensiones anteriores)

# Crear usuario y directorios necesarios
RUN groupadd -g 1000 appuser && \
    useradd -u 1000 -g appuser -m appuser && \
    mkdir -p /var/www/storage/framework/{cache,sessions,views} /var/www/bootstrap/cache

# Copiar archivos de la aplicación
COPY --from=composer_deps /app/vendor /var/www/vendor
COPY --from=node_deps /app/public/build /var/www/public/build
COPY laravel/. /var/www
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Configurar permisos y entorno
WORKDIR /var/www
RUN chown -R appuser:appuser /var/www && \
    chmod -R 775 storage bootstrap/cache && \
    if [ ! -f .env ]; then cp .env.example .env; fi

# Configurar aplicación Laravel
USER appuser
RUN php artisan key:generate --force && \
    composer dump-autoload --optimize && \
    php artisan storage:link && \
    php artisan package:discover --ansi && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 9000
CMD ["php-fpm"]