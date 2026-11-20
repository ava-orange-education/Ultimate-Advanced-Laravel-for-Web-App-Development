#!/usr/bin/env bash
php artisan queue:work --queue=high
php artisan queue:work --queue=default
php artisan queue:work --queue=low
