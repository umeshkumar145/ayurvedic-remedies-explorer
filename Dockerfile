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
