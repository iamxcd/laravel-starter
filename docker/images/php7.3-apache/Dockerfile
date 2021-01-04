FROM php:7.3-apache
RUN cd /usr/local/bin && ./docker-php-ext-install pdo_mysql sockets pcntl
RUN cp /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/