FROM php:8.2-fpm

# Installation des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libicu-dev

# Installation et activation des extensions PHP
RUN docker-php-ext-install pdo pdo_mysql intl

# Configuration PHP pour le développement
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Définition du répertoire de travail
WORKDIR /var/www/html

# Optimisation pour la production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" 