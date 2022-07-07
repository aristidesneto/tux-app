FROM composer:2 as build

WORKDIR /app
COPY . /app

RUN composer install --prefer-dist --optimize-autoloader --no-dev


FROM php:8.1-fpm

RUN useradd -ms /bin/bash -u 1000 ubuntu
RUN usermod -aG root ubuntu

WORKDIR /var/www/html

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql \    
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY --from=build /app /var/www/html
RUN chown -R www-data:www-data /var/www/html

CMD [ "php", "-S", "0.0.0.0:80" ]
