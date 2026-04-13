#!/bin/bash
set -e

cd /home/site/wwwroot

php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true
php artisan cache:clear || true

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Copiar el contenido público de Laravel a la raíz servida por Azure
if [ -d "public" ]; then
  cp -r public/* /home/site/wwwroot/
fi

# Corregir index.php para que funcione desde /home/site/wwwroot
if [ -f "/home/site/wwwroot/index.php" ]; then
  sed -i "s|__DIR__.'/../vendor/autoload.php'|__DIR__.'/vendor/autoload.php'|g" /home/site/wwwroot/index.php
  sed -i "s|__DIR__.'/../bootstrap/app.php'|__DIR__.'/bootstrap/app.php'|g" /home/site/wwwroot/index.php
fi
