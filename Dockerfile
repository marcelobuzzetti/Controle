# Stage 1: Composer
FROM composer:2 AS composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install --ignore-platform-reqs --no-scripts --no-autoloader --no-dev --prefer-dist

COPY . .

RUN composer dump-autoload --optimize --no-dev

# Stage 2: Node
FROM node:18-alpine

WORKDIR /var/www/html

# Instalar dependências do Node
COPY package*.json ./
RUN npm install

# Copiar vendor do Composer
COPY --from=composer /var/www/html/vendor ./vendor

# Copiar o restante dos arquivos
COPY . .

# Manter o container ativo
CMD ["tail", "-f", "/dev/null"]
