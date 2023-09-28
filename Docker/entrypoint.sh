#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    echo "Running composer install"
    composer install --no-progress --no-interaction
if

if [ ! -f ".env" ]; then
    echo "No .env file, using .env.example"
    cp .env.example .env
else
    echo "Using existing .env file"
fi

echo "Running artisan migrate"
php artisan migrate
php route:clear
php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
