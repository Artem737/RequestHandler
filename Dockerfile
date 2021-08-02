FROM php:7.2-cli
MAINTAINER Artem Silnicehnko <silnichenko.artem@gmail.com>
RUN mkdir -p /var/www/request_handler
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet --version=1.10.17
ADD src /var/www/request_handler/src
COPY .gitignore /var/www/request_handler
COPY composer.json /var/www/request_handler
COPY run.php /var/www/request_handler
RUN apt-get update && apt-get install -y git unzip
RUN cd /var/www/request_handler && composer install && composer dump-autoload -o