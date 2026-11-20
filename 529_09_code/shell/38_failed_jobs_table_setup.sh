#!/usr/bin/env bash
php artisan queue:failed-table
php artisan migrate
