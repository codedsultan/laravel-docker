FROM php:8.2-fpm AS php
# FROM php:8.1 as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath
# Install and enable pcntl extension
RUN docker-php-ext-install pcntl


RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

WORKDIR /var/www
COPY . .

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
# Set environment variables
# ENV PORT=8000 \
#     COMPOSER_ALLOW_SUPERUSER=1 \
#     COMPOSER_HOME=/tmp

ENV PORT=8000

# # Copy the entrypoint script
# COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# # Make it executable
# RUN chmod +x /usr/local/bin/entrypoint.sh

# Set the script as the entrypoint
# ENTRYPOINT ["entrypoint.sh"]
ENTRYPOINT [ "docker/entrypoint.sh" ]

# ==============================================================================
#  node
FROM node:18-alpine as node

WORKDIR /var/www
COPY . .

RUN npm install --global cross-env
RUN npm install

VOLUME /var/www/node_modules
