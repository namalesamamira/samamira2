FROM php:8.2.0-apache
LABEL maintainer="namalesamamira"
RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev libc-client-dev git zip cron \ 
    && apt-get install -y g++ nano libonig-dev libkrb5-dev iputils-ping openssl \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap pdo pdo_mysql mysqli mbstring \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-enable intl \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && a2enmod rewrite
RUN rm -r /var/lib/apt/lists/*
RUN curl --silent --show-error https://getcomposer.org/installer | php
# php composer-setup.php #this is the official install process for composer, the old method still works
# php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# xdebug
# && docker-php-ext-enable xdebug
