#!/usr/bin/env bash
php artisan queue:work --queue=high,default,low
