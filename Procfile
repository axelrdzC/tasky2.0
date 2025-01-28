# Install dependencies
RUN composer install --optimize-autoloader --no-dev

# Cache config, routes, and views
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Migraciones
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
