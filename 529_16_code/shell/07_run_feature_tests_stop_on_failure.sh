#!/usr/bin/env bash
set -e

php artisan test --testsuite=Feature --stop-on-failure
