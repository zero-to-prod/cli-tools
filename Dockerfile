FROM php:8.2-cli AS builder

WORKDIR /app

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
  && rm -rf /var/lib/apt/lists/*

COPY . /app

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

FROM builder AS debug

FROM builder AS composer

FROM builder AS production

RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction

RUN chmod +x /app/bin/cli-tools

ENTRYPOINT ["php", "bin/cli-tools", "--ansi"]