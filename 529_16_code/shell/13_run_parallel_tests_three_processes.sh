#!/usr/bin/env bash
set -e

php artisan test --parallel --processes=3
