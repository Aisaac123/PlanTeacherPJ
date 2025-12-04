FROM richarvey/nginx-php-fpm:latest

COPY . .

# Crear configuración de PHP-FPM con printf (mejor que echo)
RUN printf "[www]\n\
user = nginx\n\
group = nginx\n\
listen = /var/run/php-fpm.sock\n\
listen.owner = nginx\n\
listen.group = nginx\n\
pm = dynamic\n\
pm.max_children = 20\n\
pm.start_servers = 5\n\
pm.min_spare_servers = 3\n\
pm.max_spare_servers = 10\n\
pm.max_requests = 500\n" > /usr/local/etc/php-fpm.d/www.conf

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Aumentar límite de memoria
ENV COMPOSER_MEMORY_LIMIT -1
ENV PHP_MEMORY_LIMIT 512M

CMD ["/start.sh"]
