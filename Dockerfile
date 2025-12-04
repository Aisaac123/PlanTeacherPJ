FROM serversideup/php:8.4-fpm-nginx

COPY --chown=www-data:www-data . /var/www/html

WORKDIR /var/www/html

USER root

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copiar script de deploy al directorio de entrypoints
COPY scripts/00-laravel-deploy.sh /etc/entrypoint.d/00-laravel-deploy.sh
RUN chmod +x /etc/entrypoint.d/00-laravel-deploy.sh

USER www-data

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV PHP_OPCACHE_ENABLE=1

EXPOSE 8080 8443
