FROM php:7.3-apache
RUN echo deb https://mirrors.tuna.tsinghua.edu.cn/debian/ buster main contrib non-free >/etc/apt/sources.list && \
    echo deb https://mirrors.tuna.tsinghua.edu.cn/debian/ buster-updates main contrib non-free >>/etc/apt/sources.list && \
    echo deb https://mirrors.tuna.tsinghua.edu.cn/debian/ buster-backports main contrib non-free >>/etc/apt/sources.list && \
    echo deb https://mirrors.tuna.tsinghua.edu.cn/debian-security buster/updates main contrib non-free >>/etc/apt/sources.list

COPY install-php-extensions /usr/local/bin/
COPY composer /usr/local/bin/
COPY composer-auth.json /root/.composer/auth.json
RUN chmod +x /usr/local/bin/install-php-extensions \
    && chmod +x /usr/local/bin/composer \
    && install-php-extensions pdo_mysql pcntl zip \
    && cp /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/