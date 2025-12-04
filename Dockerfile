FROM serversideup/php:8.4-fpm-nginx

# Copiar el código
COPY --chown=www-data:www-data . /var/www/html

WORKDIR /var/www/html

# Cambiar a root para instalar dependencias
USER root

# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Crear script de deployment inline
RUN echo '#!/bin/sh\n\
echo "🚀 Running Laravel deployment..."\n\
php artisan config:cache\n\
php artisan route:cache\n\
php artisan migrate --force\n\
echo "✅ Deployment complete!"' > /etc/entrypoint.d/00-laravel-deploy.sh && \
    chmod +x /etc/entrypoint.d/00-laravel-deploy.sh

# Volver al usuario www-data
USER www-data

# Variables de entorno
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV PHP_OPCACHE_ENABLE=1

EXPOSE 8080 8443
