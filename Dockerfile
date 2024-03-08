FROM php:8.0.1-apache

# Install mysqli
RUN docker-php-ext-install mysqli

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory
COPY . /var/www/html

# Change ownership of the /var/www/html directory to www-data
RUN chown -R www-data:www-data /var/www/html

# Copy custom Apache configuration file and enable it
COPY default.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default.conf

# Install any project dependencies
RUN composer install

# Expose port 80
EXPOSE 80

# Command to run the apache server
CMD ["apache2-foreground"]