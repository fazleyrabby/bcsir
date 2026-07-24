#!/bin/bash
set -e

echo "Starting NIRST Container Entrypoint..."

# Wait for database container if DB_HOST is set
if [ -n "$DB_HOST" ]; then
    echo "Waiting for database connection at $DB_HOST:$DB_PORT..."
    while ! nc -z $DB_HOST ${DB_PORT:-3306}; do
        sleep 1
    done
    echo "Database ready!"
fi

# Ensure storage directories exist and have proper permissions
mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Run Laravel optimizations
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

exec "$@"
