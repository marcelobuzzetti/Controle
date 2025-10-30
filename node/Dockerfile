FROM node:18-alpine

WORKDIR /var/www/html

# Copiar package.json e package-lock.json (se existir)
COPY package*.json ./

# Instalar dependências
RUN npm install

# Copiar o restante dos arquivos da aplicação
COPY . .

# Manter o container ativo sem executar nada
CMD ["tail", "-f", "/dev/null"]
