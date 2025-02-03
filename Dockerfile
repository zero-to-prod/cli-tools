# Stage 1: Build dependencies
FROM php:8.2-alpine AS builder

WORKDIR /app

# Install system dependencies
RUN apk add --no-cache \
    git \
    unzip

# Copy only composer.json and composer.lock to leverage Docker cache
COPY composer.json composer.lock /app/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

# Install dependencies for production
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction

# Copy the rest of the application code
COPY . /app

# Make the CLI tool executable
RUN chmod +x /app/bin/cli-tools

# Stage 2: Final production image
FROM php:8.2-alpine

WORKDIR /app

# Copy all files from the builder stage
COPY --from=builder /app /app

# Set the entrypoint
ENTRYPOINT ["php", "bin/cli-tools", "--ansi"]