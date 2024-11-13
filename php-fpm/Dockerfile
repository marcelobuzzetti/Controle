FROM php:8.2-fpm-alpine
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli

# Disable error reporting
RUN echo "display_errors = Off" >> /usr/local/etc/php/php.ini
RUN echo "log_errors = On" >> /usr/local/etc/php/php.ini
RUN echo "error_log = /var/log/php_errors.log" >> /usr/local/etc/php/php.ini