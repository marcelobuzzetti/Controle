FROM nginx:mainline-alpine3.20-perl

# Metadados da imagem
LABEL maintainer="marcelobuzzetti@gmail.com"
LABEL description="Nginx web server para Sistema C2"
LABEL version="1.0"

# Remove a configuração padrão do Nginx
RUN rm /etc/nginx/conf.d/default.conf

# Copia a configuração customizada
COPY ./default.conf /etc/nginx/conf.d/default.conf

# Cria diretório de logs e ajusta permissões
RUN mkdir -p /var/log/nginx /var/cache/nginx \
    && chown -R nginx:nginx /var/log/nginx /var/cache/nginx \
    && chmod -R 755 /var/log/nginx

# Define o diretório de trabalho
WORKDIR /var/www/html

# Ajusta permissões do diretório de trabalho
RUN chown -R nginx:nginx /var/www/html \
    && chmod -R 755 /var/www/html

# Muda para usuário não-root (comentado para desenvolvimento com volumes)
# USER nginx

# Healthcheck para verificar se o Nginx está respondendo
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD wget --quiet --tries=1 --spider http://localhost/ || exit 1

# Expõe a porta HTTP
EXPOSE 80

# Inicia o Nginx em foreground
CMD ["nginx", "-g", "daemon off;"]