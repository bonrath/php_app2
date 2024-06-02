FROM php:8.3-apache

COPY . /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN apt-get update && apt-get upgrade -y && docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

#set environment variable for mysql
ENV MYSQL_DB=mysqldb
ENV MYSQL_USER=user
ENV MYSQL_PASSWORD=pass
ENV MYSQL_HOST=db
ENV MYSQL_PORT=3306

EXPOSE 80