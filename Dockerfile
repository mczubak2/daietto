FROM wordpress:latest

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host = 172.17.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
