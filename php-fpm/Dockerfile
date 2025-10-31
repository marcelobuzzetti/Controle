FROM php:8.2-fpm-alpine

# Metadados da imagem
LABEL maintainer="marcelobuzzetti@gmail.com"
LABEL description="PHP-FPM 8.2 com extensões para Sistema C2"
LABEL version="1.0"

# Instala dependências do sistema, extensões PHP e Node.js em uma única layer
RUN apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    freetype-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install -j$(nproc) \
        mysqli \
        pdo \
        pdo_mysql \
        gd \
    && docker-php-ext-enable mysqli \
    && rm -rf /tmp/* /var/cache/apk/*

# Configure php.ini para produção
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
} > /usr/local/etc/php/conf.d/99-custom.ini

# Define o diretório de trabalho
WORKDIR /var/www/html

# Cria diretório de logs e ajusta permissões
RUN mkdir -p /var/log/php \
    && chown -R www-data:www-data /var/www/html /var/log/php \
    && chmod -R 755 /var/www/html

# Muda para usuário não-root (comentado para desenvolvimento com volumes)
# USER www-data

# Healthcheck para verificar se o PHP-FPM está respondendo
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD php-fpm-healthcheck || exit 1

# Expõe a porta do PHP-FPM
EXPOSE 9000

# Inicia o PHP-FPM
CMD ["php-fpm"]