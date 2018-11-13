#!/bin/bash
touch hasthisbeenrun
git pull
php artisan down
composer install
php artisan migrate:refresh
php artisan db:seed
php artisan config:cache
php artisan view:cache
php artisan optimize
php artisan up
