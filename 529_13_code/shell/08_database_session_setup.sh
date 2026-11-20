#!/usr/bin/env bash
php artisan session:table
php artisan migrate

// .env file
SESSION_DRIVER=database
