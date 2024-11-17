FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
  git \
  zip \
  curl \
  sudo \
  unzip \
  libicu-dev \
  libbz2-dev \
  libpng-dev \
  libjpeg-dev \
  libmcrypt-dev \
  libreadline-dev \
  libfreetype6-dev \
  g++ \
  cron \
  brotli \
  nodejs \
  npm \
  libzip-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-install zip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

ENV LOG_CHANNEL=stderr
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public/

# Configure Apache DocumentRoot to point to Laravel's public directory
# and update Apache configuration files
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


COPY ./www/ /var/www/html

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
