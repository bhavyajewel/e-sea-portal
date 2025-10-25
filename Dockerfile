# Stage 1: Build Stage
FROM debian:trixie-slim AS build

# Install PHP CLI and required extensions
RUN apt-get update && apt-get install -y \
    php-cli php-mbstring php-xml php-curl unzip curl git \
    && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /app

# Install Composer manually (bypass mise)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy Composer files first to leverage cache
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# Copy all project files
COPY . .

# Stage 2: Production Stage
FROM debian:trixie-slim

# Install PHP runtime only
RUN apt-get update && apt-get install -y php-cli php-mbstring php-xml php-curl unzip git \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# Copy built application from build stage
COPY --from=build /app /app
