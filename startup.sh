#!/bin/bash
set -e

cd /home/site/wwwroot

mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

chmod -R 775 storage bootstrap/cache || true

php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true
php artisan cache:clear || true

# Copiar contenido público a la raíz servida por Azure
if [ -d "public" ]; then
  cp -r public/* /home/site/wwwroot/
fi

# Corregir index.php para ejecutarse desde /home/site/wwwroot
if [ -f "/home/site/wwwroot/index.php" ]; then
  sed -i "s|__DIR__.'/../vendor/autoload.php'|__DIR__.'/vendor/autoload.php'|g" /home/site/wwwroot/index.php
  sed -i "s|__DIR__.'/../bootstrap/app.php'|__DIR__.'/bootstrap/app.php'|g" /home/site/wwwroot/index.php
  sed -i "s|__DIR__.'/../storage/framework/maintenance.php'|__DIR__.'/storage/framework/maintenance.php'|g" /home/site/wwwroot/index.php
fi

# Aplicar configuración NGINX para Laravel
if [ -f "/home/site/wwwroot/default" ]; then
  cp /home/site/wwwroot/default /etc/nginx/sites-available/default
  service nginx reload || nginx -s reload || true
fi

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true
