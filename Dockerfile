FROM php:7.1-fpm

RUN rm /etc/apt/preferences.d/no-debian-php && \
    apt-get update && \
    apt-get install -y libxml2-dev php-soap && \
    docker-php-ext-install soap

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

CMD [ "php", "./TestInvioFatture.php" ]