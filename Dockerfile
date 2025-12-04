FROM richarvey/nginx-php-fpm:latest

COPY . .

# Actualizar repositorios a edge para obtener Node 22
RUN echo "https://dl-cdn.alpinelinux.org/alpine/edge/main" >> /etc/apk/repositories && \
    echo "https://dl-cdn.alpinelinux.org/alpine/edge/community" >> /etc/apk/repositories && \
    apk update && \
    apk add --no-cache nodejs npm

# Verificar versión
RUN node --version && npm --version

# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Publicar assets de Livewire y Filament
RUN php artisan livewire:publish --assets && \
    php artisan filament:assets

# Instalar dependencias npm
RUN cd /var/www/html && npm ci

# Compilar assets
RUN cd /var/www/html && npm run build

# Verificar build
RUN ls -la /var/www/html/public/build/ && \
    ls -la /var/www/html/public/livewire/

# Crear configuración de PHP-FPM
RUN printf "[www]\n\
user = nginx\n\
group = nginx\n\
listen = /var/run/php-fpm.sock\n\
listen.owner = nginx\n\
listen.group = nginx\n\
pm = dynamic\n\
pm.max_children = 50\n\
pm.start_servers = 10\n\
pm.min_spare_servers = 5\n\
pm.max_spare_servers = 20\n\
pm.max_requests = 500\n\
pm.process_idle_timeout = 10s\n" > /usr/local/etc/php-fpm.d/www.conf

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# FORZAR HTTPS
ENV ASSET_URL https://planteacherpj.onrender.com
ENV APP_URL https://planteacherpj.onrender.com

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Aumentar memoria
ENV COMPOSER_MEMORY_LIMIT -1
ENV PHP_MEMORY_LIMIT 1024M

CMD ["/start.sh"]
