FROM voquis/cakephp:7.4.13-apache-buster

# Copy application and config files
COPY . .

# Install production dependencies only
RUN composer install --no-dev