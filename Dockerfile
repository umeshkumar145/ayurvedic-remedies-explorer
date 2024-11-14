# Use an official PHP image with Apache
FROM php:8.2-apache

# Install necessary system dependencies and PHP extensions
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql pgsql pdo_pgsql

# Enable Apache mod_rewrite (if your app uses URL rewriting)
RUN a2enmod rewrite

# Copy the PHP project files into the container
COPY . /var/www/html/

# Set the working directory for the app
WORKDIR /var/www/html

# Expose the port Apache will run on
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
