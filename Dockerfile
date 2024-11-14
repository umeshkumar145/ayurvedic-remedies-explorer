# Use an official PHP image with Apache
FROM php:8.2-apache

# Install required extensions for PHP (add any other needed extensions)
RUN docker-php-ext-install mysqli pdo pdo_mysql

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

# Use an official PHP runtime as a parent image
FROM php:8.0-apache

# Install pgsql extension and any other dependencies
RUN apt-get update && apt-get install -y php-pgsql

# Copy application files
COPY . /var/www/html

