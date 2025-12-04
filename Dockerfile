FROM serversideup/php:8.4-fpm-nginx

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

COPY scripts/00-laravel-deploy.sh /etc/entrypoint.d/00-laravel-deploy.sh
RUN chmod +x /etc/entrypoint.d/00-laravel-deploy.sh

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV PHP_OPCACHE_ENABLE=1

EXPOSE 80
