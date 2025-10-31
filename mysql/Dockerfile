# syntax=docker/dockerfile:1

# Use the official MySQL 5.7 image as the base image
FROM mysql:5.7

# Labels for better image metadata
LABEL maintainer="marcelobuzzetti@gmail.com" \
      description="MySQL 5.7 database for Controle application" \
      version="1.0"

# Environment variables - should be overridden at runtime for security
ENV MYSQL_ROOT_PASSWORD=root \
    MYSQL_DATABASE=database \
    MYSQL_USER=user \
    MYSQL_PASSWORD=password

# Copy configuration and initialization files
# Using COPY instead of ADD for better clarity
COPY charset.cnf /etc/mysql/conf.d/charset.cnf
COPY controle.sql /docker-entrypoint-initdb.d/controle.sql

# Set proper permissions in a single RUN command to reduce layers
RUN chmod 644 /etc/mysql/conf.d/charset.cnf && \
    chmod 644 /docker-entrypoint-initdb.d/controle.sql

# Expose the default MySQL port
EXPOSE 3306

# Health check to ensure MySQL is responding
HEALTHCHECK --interval=30s --timeout=3s --start-period=40s --retries=3 \
    CMD mysqladmin ping -h localhost -u root -p${MYSQL_ROOT_PASSWORD} || exit 1

# Use the default entrypoint and cmd from the base image
# CMD ["mysqld"]