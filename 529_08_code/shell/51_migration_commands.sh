#!/usr/bin/env bash
set -euo pipefail

php artisan migrate                      # Runs default (relational) migrations
php artisan migrate:connection mongodb   # Runs MongoDB migrations only
