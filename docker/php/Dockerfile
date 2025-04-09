# Stage 1: Instalar dependencias de Composer
FROM composer:latest AS composer_deps
# Copiar composer.* y .env.example
COPY laravel/composer.* /app/
COPY laravel/.env.example /app/.env
WORKDIR /app
# Usar --no-scripts para evitar ejecutar comandos de artisan durante esta etapa
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Stage 2: Instalar dependencias de Node.js
FROM node:20 AS node_deps
WORKDIR /app
COPY laravel/package.json laravel/package-lock.json ./
# Quita la bandera --production para instalar también las dependencias de desarrollo
RUN npm ci
COPY laravel/. ./
RUN npm run build

# Stage 3: Imagen final de producción
FROM php:8.3-fpm
# Instalar dependencias del sistema
# Instalar dependencias del sistema y curl (necesario para instalar Composer)
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl git unzip zip \
    libpng-dev libwebp-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libicu-dev libsqlite3-dev \
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
# Copiar archivo php.ini personalizado
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini
# Configurar directorio de trabajo
WORKDIR /var/www
# Permisos para Laravel
RUN mkdir -p storage bootstrap/cache && \
    chown -R appuser:appuser /var/www && \
    chmod -R 775 storage bootstrap/cache

# Antes de usar "composer"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Ejecutar los scripts de Composer en la etapa final (cuando tenemos todos los archivos)
RUN composer dump-autoload --no-dev --optimize && \
    php artisan package:discover --ansi && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

USER appuser
EXPOSE 9000
CMD ["php-fpm"]