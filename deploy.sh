#!/bin/bash
php artisan down
composer install
php artisan migrate
php artisan db:seed
php artisan config:cache
php artisan view:cache
php artisan optimize
php artisan up
