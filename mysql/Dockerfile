# Use the official MySQL 5.7 image as the base image
FROM mysql:5.7

# Set the root password for MySQL
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=database
ENV MYSQL_USER=user
ENV MYSQL_PASSWORD=password

# Copy the SQL script to initialize the database
COPY controle.sql /docker-entrypoint-initdb.d/

ADD charset.cnf /etc/mysql/conf.d/
RUN chmod 644 /etc/mysql/conf.d/charset.cnf

# Expose the default MySQL port
EXPOSE 3306