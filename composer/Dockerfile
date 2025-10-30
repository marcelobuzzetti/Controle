FROM composer:2

WORKDIR /var/www/html

# Copiar composer.json e composer.lock
COPY composer.json composer.lock ./

# Instalar dependências do Composer
RUN composer install --ignore-platform-reqs --no-scripts --no-autoloader --no-dev --prefer-dist

# Copiar o restante dos arquivos
COPY . .

# Finalizar a instalação do Composer (gerar autoloader)
RUN composer dump-autoload --optimize --no-dev

# Manter o container ativo sem executar nada
CMD ["tail", "-f", "/dev/null"]
