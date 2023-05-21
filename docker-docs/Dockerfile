FROM php:7.3-apache

RUN docker-php-ext-install mysqli

RUN apt-get update && apt-get install -y git

WORKDIR /var/www/html

RUN git clone https://github.com/rogeriesmontsia/M898_PHP.git .

WORKDIR /var/www/html/M898

mv * ..