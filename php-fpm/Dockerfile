FROM php:8.2-fpm-alpine
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli
RUN apk add --no-cache libpng-dev libjpeg-turbo-dev libwebp-dev libxpm-dev freetype-dev
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm
RUN docker-php-ext-install gd

# Configure php.ini for production
RUN { \
    echo "display_errors = Off"; \
    echo "log_errors = On"; \
    echo "error_log = /var/log/php_errors.log"; \
    echo "expose_php = Off"; \
    echo "display_startup_errors = Off"; \
    echo "track_errors = Off"; \
    echo "html_errors = Off"; \
    echo "session.cookie_httponly = On"; \
    echo "session.cookie_secure = On"; \
    echo "session.use_strict_mode = On"; \
    echo "session.use_only_cookies = On"; \
    echo "memory_limit = 128M"; \
    echo "post_max_size = 8M"; \
    echo "upload_max_filesize = 2M"; \
    echo "max_execution_time = 30"; \
    echo "max_input_time = 60"; \
    echo "error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT"; \
} >> /usr/local/etc/php/php.ini